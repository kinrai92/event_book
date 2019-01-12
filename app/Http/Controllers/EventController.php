<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Event\Event;
use Validator;
use App\Model\Master\Mtbmunicipality;
use App\Model\Master\MtbEventStatus;
use App\Model\User\UserDetail;

class EventController extends Controller
{
  public function update(Request $request)
  {

   $event = Event::find($request->id);

   $event->cooperation_id = $request->cooperation_id;
   $event->mtb_event_status_id = $request->mtb_event_status_id;
   $event->mtb_municipality_id = $request->mtb_municipality_id;
   $event->title = $request->title;
   $event->start_at = $request->start_at;
   $event->maximum = $request->maximum;
   $event->minimum = $request->minimum;
   $event->cost = $request->cost;
   $event->detail = $request->detail;
   $event->picture1 = 123;
   $event->picture2 = 123;
   $event->picture3 = 123;

   $event->save();
   return view('userlogin.checkmail');
  }

  public function updateevent(Request $request, $id)
  {
    $event=Event::find($id);

   return view('cooperation.updateevent', [
     'data' => $event,
     "mtb_event_status" =>MtbEventStatus::all(),
     "mtb_municipality" =>Mtbmunicipality::all()
    ]);

  }
}
