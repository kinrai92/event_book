<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Event\Event;
use App\Model\Ticket\Ticket;
use Illuminate\Support\Facades\DB;
class ApiController extends Controller
{
    public function get_events_number(Request $request)
    {
      $events_number = Event::get()->count();

      return [
        "number" => $events_number
      ];

    }

public function get_events_by_pv(Request $request)
{
  $events = Event::orderBy('page_view', 'desc')->take(3)->get();

  return [
    "events" => $events
    ] ;

}

//人気イベント
    public function get_events_title(Request $request)
    {
      $events = Ticket::selectRaw('count(*) as top,event_id')
                  ->groupBy('event_id')
                  ->orderBy('top','desc')
                  ->limit(3)
                  ->get()
                  ->pluck('event_id')
                  ->toArray();
    $events_top = Event::whereIn('id',$events)->get();

        return response()->json($events_top);

    }

}
