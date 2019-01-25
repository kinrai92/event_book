<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventInfoToUsers extends Mailable
{
    use Queueable, SerializesModels;

    public $event_title;
    public $area;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($event)
    {
        $this->event_title = $event->title;
        $this->area = $event->mtb_municipality->value;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.EventInfoToUsers')
                    ->subject('新規イベント')
                    ->with(['event_title' => $this->event_title, 'event_area' => $this->area]);
    }
}
