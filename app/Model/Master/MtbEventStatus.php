<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class MtbEventStatus extends Model
{
    const OPENING = 1;
    const HELD = 2;
    const CANCELED = 3;

    protected $table = "mtb_event_statuses";

    public function events()
    {
      return $this->hasMany("App\Model\Event\Event", "mtb_event_status_id");
    }
}
