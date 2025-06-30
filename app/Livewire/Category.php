<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category as CategoryModel;
use App\Models\Product;
use App\Models\SubCategory;

class Category extends Component
{
    public $categories;
    public $selectedCategory = '';
    public $subcategories = [];
    public $products = [];
    public $groupedProducts = [];

    public function mount()
    {
        // Actualizar productos que ya no son nuevos
        Product::where('status', 2)
            ->where('created_at', '<=', now()->subMonths(2))
            ->update(['status' => 1]);



       // Luego continúa con tu lógica actual
        $this->categories = CategoryModel::where('type', 'product')
            ->whereStatus(1)
            ->orderBy('name', 'desc')
            ->get();

        if ($this->categories->isNotEmpty()) {
            $this->selectedCategory = $this->categories->first()->id;

            // Cargar subcategorías
            $this->subcategories = SubCategory::where('category_id', $this->selectedCategory)->get();

            // Agrupar productos por subcategoría
            $this->groupedProducts = [];


            foreach ($this->subcategories as $subcategory) {
                $products = Product::with('options')
                    ->where('sub_category_id', $subcategory->id)
                    ->get();

                if ($products->isNotEmpty()) {
                    $this->groupedProducts[$subcategory->name] = $products;
                }
            }
        }
    }

    public function updatedSelectedCategory($value)
    {
        if ($value) {
            $this->subcategories = SubCategory::where('category_id', $value)->get();

            // Agrupar productos por subcategoría
            $this->groupedProducts = [];

            foreach ($this->subcategories as $subcategory) {
                $products = Product::where('sub_category_id', $subcategory->id)->get();

                if ($products->isNotEmpty()) {
                    $this->groupedProducts[$subcategory->name] = $products;
                }
            }
        } else {
            $this->subcategories = [];
            $this->groupedProducts = [];
        }
    }

    public function render()
    {
        return view('livewire.category');
    }
}
