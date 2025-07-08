<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class OrderConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;


    public $order;
    /**
     * Create a new message instance.
     */
    public function __construct(Order $order)
    {

        $this->order = $order->load('products');
    }

    public function build()
    {
        $mail = $this->subject('Confirmation de commande')
            ->markdown('emails.orders.confirmation')
            ->with(['order' => $this->order]);

        if ($this->order->proof_path && Storage::disk('public')->exists($this->order->proof_path)) {
            $mail->attachFromStorageDisk('public', $this->order->proof_path);
        }

        return $mail;
    }
}
