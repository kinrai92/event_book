<?php

namespace App\Model\Comment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    public function user()
    {
      return $this->belongsTo("App\Model\User\User");
    }
}
