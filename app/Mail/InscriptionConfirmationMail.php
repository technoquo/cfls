<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InscriptionConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $inscription;
    public $formation;
    public $calendar;
    /**
     * Create a new message instance.
     */
    public function __construct($inscription, $formation, $calendar = null)
    {
        $this->inscription = $inscription;
        $this->formation = $formation;
        $this->calendar = $calendar;
    }


    public function build()
    {
        return $this->subject('Confirmation de votre inscription')
            ->view('emails.inscription-confirmation');
    }
}
