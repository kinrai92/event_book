<?php

namespace App\model\Cooperation;

use Illuminate\Database\Eloquent\Model;

class Cooperation extends Model
{
    protected $table = "cooperations";

    public function events()
    {
      return $this->hasMany("App\Model\Event\Event", "cooperation_id");
    }

}
