<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class UserDetail extends Model
{
    protected $table = "user_details";

    public function get_age()
    {
      $date=Carbon::parse($this->birthday);
      return Carbon::createFromDate($date->year)->diff(Carbon::now())->format('%y');
    }
    public function user()
    {
      return $this->belongsTo("App\Model\User\User", "user_id");
    }

    public function tickets()
    {
      return $this->hasMany("App\Model\Ticket\Ticket", "user_id");
    }

    public function mtb_area()
    {
      return $this->belongsTo("App\Model\Master\MtbArea");
    }
}
