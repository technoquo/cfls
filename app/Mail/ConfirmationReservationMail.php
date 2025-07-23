<?php

namespace App\Mail;

use App\Models\InscriptionTableConversation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmationReservationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $inscription;

    public function __construct(InscriptionTableConversation $inscription)
    {
        $this->inscription = $inscription;
    }

    public function build()
    {
        return $this->subject('Confirmation de réservation')
            ->view('emails.confirmation-reservation');
    }
}

