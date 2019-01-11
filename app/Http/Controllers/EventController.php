<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function allevents() {
      $events = Event::all();
      return view("event.all", ["events" => $events]);
    }
}
