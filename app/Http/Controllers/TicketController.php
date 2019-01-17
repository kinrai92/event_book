<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Ticket\Ticket;
use App\Model\Master\MtbTicketStatus;
use App\Model\User\User;
use App\Model\Event\Event;
use Validator;

class TicketController extends Controller
{
    public function create(Request $request)
    {
      $validator_rules = [
        "user_id" => "required|unique:user_details,user_id",

      ];
      $validator_messages = [
        "user_id.unique" => "お客様はすでに注文しました。二回目の申し込みはできません",
      ];

      $validator=Validator::make($request->all(),$validator_rules,$validator_messages);
      if($validator->fails()){
        return redirect(route("get_events"))->withInput()->withErrors($validator);
      }

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
                                                                MtbTicketStatus::CANCELLED])->where("user_id", auth('user')->user()->id)->get();

    } elseif($status == "not_used") {
      $tickets = Ticket::query()->where("mtb_ticket_status_id", MtbTicketStatus::NOT_USED)->where("user_id", auth('user')->user()->id)->get();
      $current_page = "not_used";
    } elseif($status == "used") {
      $tickets = Ticket::query()->where("mtb_ticket_status_id", MtbTicketStatus::USED)->where("user_id", auth('user')->user()->id)->get();
      $current_page = "used";
    } elseif($status == "cancelled") {
      $tickets = Ticket::query()->where("mtb_ticket_status_id", MtbTicketStatus::CANCELLED)->where("user_id", auth('user')->user()->id)->get();
      $current_page = "cancelled";
    }
    return view("user.tickets", ["tickets" => $tickets,"current_page" => $current_page]);
  }

  public function show_qrcode(Request $request,$qrcode=null)
  {
    return view('user.ticket_qrcode',['qrcode' => $qrcode]);
  }

  /**
   *
   *チケットの削除及び注文の取り消し。
   *
   */
   public function delete(Request $request,$id)
   {
     Ticket::find($id)->delete();
     return redirect()->back();
   }
}
