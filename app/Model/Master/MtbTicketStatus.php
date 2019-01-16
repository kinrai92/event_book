<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class MtbTicketStatus extends Model
{
    const NOT_USED = 1;
    const USED = 2;
    const CANCELLED = 3;
    protected $table = "mtb_ticket_statuses";

    public function tickets()
    {
      return $this->hasMany("App\Model\Ticket\Ticket", "mtb_ticket_status_id");
    }
}
