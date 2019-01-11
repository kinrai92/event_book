<?php

namespace App\model\Event;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    protected $table = "events";

    use SoftDeletes;

    public function Cooperation()
    {
      return $this->belongsTo("App\Model\Cooperation\Cooperation", "cooperation_id");
    }
}
