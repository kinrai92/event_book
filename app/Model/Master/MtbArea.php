<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class MtbArea extends Model
{
    protected $table = "mtb_areas";

    public function users(){

      return $this->hasMany("App\Model\User\UserDetail","mtb_area_id");
    }
}
