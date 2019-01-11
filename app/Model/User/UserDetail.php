<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $table = "user_details";

    public function user()
    {
      return $this->belongsTo("App\Model\User\User", "user_id");
    }
}
