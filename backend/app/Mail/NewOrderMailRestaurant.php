<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewOrderMailRestaurant extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $orderId;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $orderId)
    {
        $this->data = $data;
        $this->orderId = $orderId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.restaurantMail')->with(['data', $this->data, 'orderId', $this->orderId]);
    }
}
