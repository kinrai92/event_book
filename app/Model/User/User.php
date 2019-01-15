<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
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

    public function user_detail()
    {
      return $this->hasOne("App\Model\User\UserDetail", "user_id");
    }

    public function tickets()
    {
      return $this->hasMany("App\Model\Ticket\Ticket", "user_id");
    }

    public function getAuthIdentifierName(){

      return $this->primaryKey;
    }
    public function getAuthIdentifier(){

      return $this->id;
    }
    public function getAuthPassword()
    {
      return $this->password;
    }
    public function getRememberToken(){}
    public function setRememberToken($value){}
    public function getRememberTokenName(){}
