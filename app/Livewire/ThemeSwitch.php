<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Log;

class ThemeSwitch extends Component
{
    public $theme;



    public function render()
    {
        return view('livewire.theme-switch');
    }
}
