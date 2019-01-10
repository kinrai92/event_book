<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailSender extends Mailable
{
    use Queueable, SerializesModels;

     private $token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token)
    {
      $this->token=$token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('tmp_blade.helloworld')
                    ->subject('Verify Your Mail')
                    ->with(['token'=>$this->token]);
    }
}
