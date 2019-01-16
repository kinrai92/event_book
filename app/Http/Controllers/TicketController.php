<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Ticket\Ticket;
use App\Model\Master\MtbTicketStatus;
use App\Model\User\User;
use App\Model\Event\Event;

class TicketController extends Controller
{
    public function create(Request $request)
    {
      $ticket=new Ticket;
      $ticket->code=substr(md5(uniqid(rand(), true)),8,16);
      $ticket->user_id=$request->user_id;
      $ticket->event_id=$request->event_id;
      $ticket->mtb_ticket_status_id=1;
      $ticket->save();
      return view('others.tmp_blade.successed');
    }

    public function show_user_tickets_page(Request $request,$status=null)
  {
    $tickets = null;
    $current_page = "all";
    if(!$status) {
      $tickets = Ticket::query()->whereIn("mtb_ticket_status_id", [MtbTicketStatus::NOT_USED,
                                                                   MtbTicketStatus::USED,
                                                                   MtbTicketStatus::CANCELLED])->get();

    } elseif($status == "not_used") {
      $tickets = Ticket::query()->where("mtb_ticket_status_id", MtbTicketStatus::NOT_USED)->get();
      $current_page = "not_used";
    } elseif($status == "used") {
      $tickets = Ticket::query()->where("mtb_ticket_status_id", MtbTicketStatus::USED)->get();
      $current_page = "used";
    } elseif($status == "cancelled") {
      $tickets = Ticket::query()->where("mtb_ticket_status_id", MtbTicketStatus::CANCELLED)->get();
      $current_page = "cancelled";
    }
    return view("user.tickets", ["tickets" => $tickets,"current_page" => $current_page]);
  }

}
