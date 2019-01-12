<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Event\Event;
use App\Model\Master\MtbMunicipality;
use App\Model\Master\MtbEventStatus;

class EventController extends Controller
{
    public function events(Request $requests, $status = null) {

      $events = null;
      $current_page = "all";

      if(!$status) {
        $events = Event::all();
      } elseif($status == "opening") {
        $events = Event::query()->where("mtb_event_status_id", MtbEventStatus::OPENING)->get();
        $current_page = "opening";
      } elseif($status == "held") {
        $events = Event::query()->where("mtb_event_status_id", MtbEventStatus::HELD)->get();
        $current_page = "held";
      }

      return view("event.event_all", ["events" => $events,"current_page" => $current_page]);
    }

    public function get_one_event(Request $request, $id) {
      return view("event.event_detail", ["id" => $id]);
    }
}
