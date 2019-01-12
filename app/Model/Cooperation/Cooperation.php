<?php

namespace App\Model\Cooperation;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cooperation extends Model
{

    use SoftDeletes;

    protected $guarded=array('id');

    public function set_password($password) {
      $this->password = Hash::make($password);
    }

    public function mtb_area()
    {
      return $this->belongsTo("App\Model\Master\MtbArea", "mtb_area_id");
    }

    public function mtb_staff_total(){

      return $this->belongsTo("App\Model\Master\MtbStaffTotal","mtb_staff_total_id");
    }

    public function mtb_industry_tpye(){

      return $this->belongsTo("App\Model\Master\MtbIndustryType","mtb_industry_tpye_id");
    }

    public function events()
    {
      return $this->hasMany("App\Model\Event\Event", "cooperation_id");
    }
}
