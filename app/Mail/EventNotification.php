<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $event_id;
    public $event_title;
    public $event_sup;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($event_id, $event_title, $event_sup)
    {
        $this->event_id = $event_id;
        $this->event_title = $event_title;
        $this->event_sup = $event_sup;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.eventNotification')
                    ->subject('新規イベント')
                    ->with(['event_id' => $this->event_id, 'event_title' => $this->event_title, 'event_sup' => $this->event_sup,]);
    }
}
