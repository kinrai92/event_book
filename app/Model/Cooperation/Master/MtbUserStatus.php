<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class MtbUserStatus extends Model
{

  const MAIL_NOT_CONFIRMED = 1;
  const DETAIL_NOT_INPUT = 2;
  const REAL_USER = 3;
  protected $table = "mtb_user_statuses";

  public function users()
  {
    return $this->hasMany("App\Model\User\User", "mtb_user_status_id");
  }
}
