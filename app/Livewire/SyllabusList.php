<?php

namespace App\Livewire;

use Livewire\Component;

class SyllabusList extends Component
{
    public $wordsList = [
        "Végétarien", "Sucre en poudre", "Sel", "Saucisse", "Mayonnaise (2)", "Sauce", "Purée", "Oeuf (2)",
        "Moins cher", "Légume", "Ketchup", "Frites (2)"
    ];

    public $vimeoBaseIds = [
        "1047122935", "1047122905", "1047122880", "1047122856",
        "1047122718", "1047122829", "1047122800", "1047122758",
        "1047122736", "1047122698", "1047122665", "1047122638"
    ];

    public $vimeoVideos = [];
    public $currentIndex = 0;

    public function mount()
    {
        // Generar el mapeo de palabras a IDs de Vimeo
        foreach ($this->wordsList as $index => $word) {
            $this->vimeoVideos[$word] = $this->vimeoBaseIds[$index % count($this->vimeoBaseIds)];
        }
    }

    public function selectWord($index)
    {
        $this->currentIndex = $index;
    }
    public function render()
    {
        return view('livewire.syllabus-list');
    }
}
