<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailConfirm extends Mailable
{
    use Queueable, SerializesModels;

    public $text;
    public $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($text, $token)
    {

        $this->text=$text;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.mail_confirm')
                    ->subject('eventbook')
                    ->with(['message_text'=>$this->text, "token" => $this->token]);
    }
}
