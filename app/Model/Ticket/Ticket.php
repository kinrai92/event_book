<?php

namespace App\Model\Ticket;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = "tickets";

    public function event()
    {
      return $this->belongsTo("App\Model\Event\Event", "event_id");
    }

    public function user()
    {
      return $this->belongsTo("App\Model\User\User", "user_id");
    }
}
