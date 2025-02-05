<?php

namespace App\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public $message = "Here are the biggest enterprise technology acquisitions of 2021.";
    public $videoSrc;
    public $showModal = false;

    public function render()
    {
      
        return view('livewire.modal');
    }
}
