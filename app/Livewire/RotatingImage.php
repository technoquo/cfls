<?php

namespace App\Livewire;

use Livewire\Component;

class RotatingImage extends Component
{
    public $images = [];
    public $current = 0;
    public $rotating = false;
    public $polling = false;

    public function mount(array $images)
    {
        $this->images = array_filter($images);
        $this->current = 0;
    }

    public function startRotating()
    {
        $this->rotating = true;
        $this->polling = true;
    }

    public function stopRotating()
    {
        $this->rotating = false;
        $this->polling = false;
        $this->current = 0;
    }

    public function nextImage()
    {
        if ($this->rotating && count($this->images) > 1) {
            $this->current = ($this->current + 1) % count($this->images);
        }
    }

    public function render()
    {
        return view('livewire.rotating-image');
    }
}
