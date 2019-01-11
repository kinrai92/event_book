<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    public function set_password($password) {
      $this->password = Hash::make($password);
    }

    public function create_token()
    {

      $token = str_random(20);
      $user = User::query()->where("token", $token)->first();

      while($user) {
        $token = str_random(20);
        $user = User::query()->where("token", $token)->first();
      }
      $this->token = $token;
    }


    public function mtb_user_status()
    {
      return $this->belongsTo("App\Model\Master\MtbUserStatus", "mtb_user_status_id");
    }
}
