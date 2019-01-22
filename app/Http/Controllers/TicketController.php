<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Ticket\Ticket;
use App\Model\Master\MtbTicketStatus;
use App\Model\User\User;
use App\Model\User\UserDetail;
use App\Model\Event\Event;
use Validator;

class TicketController extends Controller
{
    public function create(Request $request)
    {
    $ticketCount = Ticket::where('user_id',$request->user_id)
                        ->where('event_id',$request->event_id)
                        ->count();
    if($ticketCount){
        echo "お客様はすでに注文しました。二回目の申し込みはできません";
      }else{
      $ticket=new Ticket;
      $ticket->code=substr(md5(uniqid(rand(), true)),8,16);
      $ticket->user_id=$request->user_id;
      $ticket->event_id=$request->event_id;
      $ticket->mtb_ticket_status_id=1;
      $ticket->save();
      return view('others.tmp_blade.successed');
      }
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

  /*public function show_qrcode(Request $request,$qrcode=null)
  {
    return view('user.ticket_qrcode',['qrcode' => $qrcode]);
  }*/
  /**
   *
   *企業側チケットの取り消し機能。
   *
   */
   public function cancell(Request $request,$id)
   {
     $ticket = Ticket::find($id);
     $ticket->mtb_ticket_status_id = MtbTicketStatus::CANCELLED;
     $ticket->save();
     return redirect()->back();
   }

   public function ticket_cancel(Request $request){
     $ticket = Ticket::query()->where("id", $request->id)->first();
     $ticket->mtb_ticket_status_id = MtbTicketStatus::CANCELLED;
     $ticket->save();
     return view("welcome");
   }

 /**
  *
  *チケットの生成。
  *
  */
  public function create_ticket(Request $request)
  {
    $ticket = Ticket::query()->where('user_id',auth('user')->user()->id)
                             ->where('event_id',$request->event_id)
                             ->first();
    if($ticket){
      $error_message = '一つのイベントに複数の申し込みはできません';
      return redirect()->back()->with(['one_message' => $error_message]);
    }
    if(!$ticket){
      $code = str_random(16);
      $ticket = Ticket::query()->where('code',$code)->first();
      while($ticket){
        $code = str_random(16);
        $ticket = Ticket::query()->where('code',$code)->first();
      }
      $one_ticket = new Ticket;
      $one_ticket->code = $code;
      $one_ticket->user_id = auth('user')->user()->id;
      $one_ticket->event_id = $request->event_id;
      $one_ticket->mtb_ticket_status_id = MtbTicketStatus::NOT_USED;
      $one_ticket->save();
      $successed_message = '申し込み成功';
      return redirect()->back()->with(['one_message' => $successed_message]);
    }
  }
  /**
   *
   *QRコードの生成
   *
   */
   public function show_QRcode(Request $request,$code)
   {
     $ticket = Ticket::query()->where('code',$code)->first();
     $text = 'http://localhost:8000/kensyou/'.$code;
     return view('others.tmp_blade.show_my_QRticket',['ticket' => $ticket,'text' => $text]);
   }
 }
