<?php

namespace App\Livewire;

use Livewire\Component;

class RotatingImage extends Component
{
    public $images = [];
    public $current = 0;
    public $rotating = false;
    public $polling = false;

    public function mount($images)
    {
        // Solo usar imágenes adicionales (image_two y image_three)
        $this->images = array_values(array_filter($images));
        $this->current = 0;
    }

    public function startRotating()
    {
        if (count($this->images) > 1) {
            $this->rotating = true;
            $this->polling = true;
        }
    }

    public function stopRotating()
    {
        $this->rotating = false;
        $this->polling = false;
        // NO se reinicia la imagen actual
        // $this->current = 0; ← Esto se elimina
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
