<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Recipe extends Mailable
{
    use Queueable, SerializesModels;


    private $user;
    private $seller;
    private $address;
    private $purchase;
    private $price;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $seller, $address, $purchase, $price)
    {
        $this->user = $user;
        $this->seller = $seller;
        $this->address = $address;
        $this->purchase = $purchase;
        $this->price = $price;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $this->subject("Nozama - Recibo - " . $this->purchase->title);
        return $this->view('emails.recipe',['user' => $this->user, 'seller' => $this->seller, 'address' => $this->address , 'purchase' => $this->purchase , 'price' => $this->price]);
    }
}
