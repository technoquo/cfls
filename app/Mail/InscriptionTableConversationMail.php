<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InscriptionTableConversationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $inscription;
    public $table;
       /**
     * Create a new message instance.
     */
    public function __construct($inscription, $table )
    {
        $this->inscription = $inscription;
        $this->table = $table;
    }


    public function build()
    {
        return $this->subject('Confirmation de votre inscription à la table de conversation')
            ->view('emails.inscription-tableconversation');
    }
}
