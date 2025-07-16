<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCompletedClientNotification extends Mailable
{
    use Queueable, SerializesModels;

    public Order $order;

    public function __construct(Order $order)
    {
        $this->order = $order->load([
            'user',
            'productOrders.product.mainImage'
        ]);
    }

    public function build()
    {
        return $this->subject('Votre commande est en route !')
             ->markdown('emails.orders.completed')
             ->with(['order' => $this->order]);
    }
}
