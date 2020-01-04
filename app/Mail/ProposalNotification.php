<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProposalNotification extends Mailable
{
    use Queueable, SerializesModels;

    private $proposal;
    private $purchase;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($proposal , $purchase)
    {
        $this->proposal = $proposal;
        $this->purchase = $purchase;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject("Nozama - Recebeu uma proposta de ". $this->proposal->user->name .".");
        return $this->view('emails.proposal', ['proposal' => $this->proposal, 'purchase' => $this->purchase]);
    }
}
