<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Contact extends Mailable
{
    use Queueable, SerializesModels;



    public $from_user;

    public $message;

    public $sub;




    public function __construct($message,$from,$subject)
    {
        $this->message = $message;
        $this->from_user = $from;
        $this->subject("Nozama - Mensagem do utilizador ". $from->name);
        $this->sub = $subject;
        $this->replyTo($from->email, $from->name);

    }


    public function build()
    {
        $message = $this->message;


        return $this->view('emails.contact',['message_body' => $message, "user" => $this->from_user, "subject" => 
        $this->sub]);
    }
}
