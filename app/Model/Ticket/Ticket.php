<?php

namespace App\Model\Ticket;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Model\Master\MtbTicketStatus;

class Ticket extends Model
{
    use SoftDeletes;

    protected $table = "tickets";

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function event()
    {
      return $this->belongsTo("App\Model\Event\Event", "event_id");
    }

    public function user()
    {
      return $this->belongsTo("App\Model\User\User", "user_id");
    }

    public function user_detail()
    {
      return $this->belongsTo("App\Model\User\UserDetail", "user_id");
    }

    public function usermail()
    {
      return $this->belongsTo("App\Model\User\User","user_id");
    }

    public function mtb_ticket_status()
    {
      return $this->belongsTo("App\Model\Master\MtbTicketStatus", "mtb_ticket_status_id");
    }

    public static function create_ticket($data) {

      $result = self::query()->where("event_id", $data["event_id"])->where("user_id", $data["user_id"])->first();

      if($result) {
        return null;
      }


      $code = str_random(16);
      $ticket = self::query()->where('code',$code)->first();
      while($ticket){
        $code = str_random(16);
        $ticket = self::query()->where('code',$code)->first();
      }
      $one_ticket = new Ticket;
      $one_ticket->code = $code;
      $one_ticket->user_id = $data["user_id"];
      $one_ticket->event_id = $data["event_id"];
      $one_ticket->mtb_ticket_status_id = MtbTicketStatus::NOT_USED;
      $one_ticket->save();

      return $one_ticket;
    }

}
