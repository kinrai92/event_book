<?php

namespace App\Model\Ticket;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    protected $table = "tickets";

    public function event()
    {
      return $this->belongsTo("App\Model\Event\Event", "event_id");
    }

    public function user()
    {
      return $this->belongsTo("App\Model\User\UserDetail", "user_id");
    }

    public function mtb_ticket_status()
    {
      return $this->belongsTo("App\Model\Master\MtbTicketStatus", "mtb_ticket_status_id");
    }

}
