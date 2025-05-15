<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Subscribe;



class SubscribeForm extends Component
{
    public $email;
    public $successMessage;

    public function subscribe()
    {
        $this->validate([
            'email' => 'required|email',
        ]);

        // Check if email already exists
        if (Subscribe::where('email', $this->email)->exists()) {
            $this->addError('email', 'Cet e-mail est déjà inscrit.');
            return;
        }

        // Save the new subscription
        Subscribe::create(['email' => $this->email]);

        $this->successMessage = 'Inscription réussie !';
        $this->reset('email');
    }

    public function render()
    {
        return view('livewire.subscribe-form');
    }
}
