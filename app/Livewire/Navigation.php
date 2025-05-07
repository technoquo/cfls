<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class Navigation extends Component
{
    public $submenus = [];

    public function mount()
    {
        $this->submenus = Category::whereStatus(1)
                                    ->whereType('video')
                                     ->get();

    }
    public function render()
    {
        return view('livewire.navigation');
    }
}
