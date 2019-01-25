<?php

namespace App\Http\Controllers\Command;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Event\Event;
use App\Model\Master\MtbEventStatus;
use Carbon\Carbon;

class CommandController extends Controller
{

  public function check()
  {
    $events = Event::all();
    $today = date('d',strtotime(Carbon::now()));
    $count = 0;

    foreach($events as $event){
     $start_at = date('d',strtotime($event->start_at));
      if($event->mtb_event_status_id == MtbEventStatus::CANCEL){
        continue;
      }elseif($start_at - $today < 3 && $event->tickets()->count() < $event->minimum){
        $event->mtb_event_status_id = MtbEventStatus::CANCEL;
        $count++;
        $event->save();
      }
   }
    echo $count.'件がキャンセルされました!';
 }
}
