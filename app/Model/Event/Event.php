<?php

namespace App\Model\Event;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    protected $table = "events";

    protected $dates = ['created_at', 'updated_at', 'deleted_at', "start_at"];

    use SoftDeletes;

    public function cooperation()
    {
      return $this->belongsTo("App\Model\Cooperation\Cooperation", "cooperation_id");
    }

    public function mtb_municipality()
    {
      return $this->belongsTo("App\Model\Master\MtbMunicipality", "mtb_municipality_id");
    }

    public function mtb_event_status()
    {
      return $this->belongsTo("App\Model\Master\MtbEventStatus", "mtb_event_status_id");
    }

    public function tickets()
    {
      return $this->hasMany("App\Model\Ticket\Ticket", "event_id");
    }

}
