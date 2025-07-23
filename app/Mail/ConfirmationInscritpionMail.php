<?php

namespace App\Mail;

use App\Models\InscriptionFormation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmationInscritpionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $inscription;

    public function __construct(InscriptionFormation $inscription)
    {
        $this->inscription = $inscription;
    }

    public function build()
    {
        return $this->subject('Confirmation de réservation')
            ->view('emails.confirmation-inscription');
    }
}

