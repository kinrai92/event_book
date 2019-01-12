<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class MtbMunicipality extends Model
{
    protected $table = "mtb_municipalities";

    public function events()
    {
      return $this->hasMany("App\Model\Event\Event", "mtb_municipality_id");
    }
}
