<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Event\Event;

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
}
