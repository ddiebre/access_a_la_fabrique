<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void 
     */
    public function __construct($infos)
    {
        $this->email_data = $infos;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env ('MAIL_USERNAME', 'tapsobanafissatou8@gmail.com'))->subject("Confirmation de l'inscription")->view('emails.contact', ['infos'=>$this->email_data]);
    }
}
