<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class VideoCarousel extends Component
{
    public $vimeos;
    public $category;

    public function mount($categorySlug)
    {
        $category = Category::where('slug', $categorySlug)->first();
        
        if ($category) {
            $this->category = $category->toArray(); // Convert category to array
            $this->vimeos = $category->videos(); // Paginate videos
        }
    }

    public function render()
    {
        return view('livewire.video-carousel');
    }
}
