<?php

namespace App\Model\Master;

use Illuminate\Database\Eloquent\Model;

class MtbEventStatus extends Model
{
  const NOT_PUBLISH = 1;
  const PUBLISH = 2;
  const CANCEL = 3;
    protected $table = "mtb_event_statuses";

    public static function get_create_statuses()
    {

      $statuses = self::query()->whereIn("id", [self::NOT_PUBLISH, self::PUBLISH])->get();
      return $statuses;

    }
}
