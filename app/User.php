<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Model
{
    use SoftDeletes;

    public function scopeTokenEqual($query,$str){

      return $this->where('token',$str);
    }
}
