<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Event\Event;
use App\Model\Cooperation\Cooperation;
use App\Model\User\UserDetail;
use App\Model\Ticket\Ticket;
use App\Model\Master\MtbMunicipality;
use App\Model\Master\MtbTicketStatus;
use App\Model\Master\MtbEventStatus;
use Illuminate\Support\Facades\Mail;
use App\Mail\EventNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
use Validator;
class EventController extends Controller
{
    public function events(Request $requests, $status = null) {
      $events = null;
      $current_page = "all";
      if(!$status) {
        $events = Event::query()->whereIn("mtb_event_status_id", [MtbEventStatus::PUBLISH, MtbEventStatus::CANCEL])->get();
      } elseif($status == "opening") {
        $events = Event::query()->where("mtb_event_status_id", MtbEventStatus::PUBLISH)->where("start_at", ">=", Carbon::now())->get();
        $current_page = "opening";
      } elseif($status == "held") {
        $events = Event::query()->where("mtb_event_status_id", MtbEventStatus::PUBLISH)->where("start_at", "<", Carbon::now())->get();
        $current_page = "held";
      } elseif($status == "canceled") {
        $events = Event::query()->where("mtb_event_status_id", MtbEventStatus::CANCEL)->get();
        $current_page = "canceled";
      }

      return view("event.event_all", ["events" => $events, "current_page" => $current_page,]);
    }

    public function get_one_event(Request $request, $id) {
      $event = null;
      $event = Event::find($id);
      $tickets = Event::find($id)->tickets;
      $num_tickets = $tickets->count();
      return view("event.event_detail", ["event" => $event, "num_tickets" => $num_tickets]);
    }

    public function events_cooperation(Request $requests, $status = null) {

      $events = null;
      $current_page = "all";

      if(!$status) {
        $events = Event::query()->where("cooperation_id", auth('cooperation')->user()->id);
      } elseif($status == "opening") {
        $events = Event::query()->where("mtb_event_status_id", MtbEventStatus::PUBLISH)->where("start_at", ">=", Carbon::now())->where("cooperation_id", auth('cooperation')->user()->id);
        $current_page = "opening";
      } elseif($status == "held") {
        $events = Event::query()->where("mtb_event_status_id", MtbEventStatus::PUBLISH)->where("start_at", "<", Carbon::now())->where("cooperation_id", auth('cooperation')->user()->id);
        $current_page = "held";
      } elseif($status == "not_publish") {
        $events = Event::query()->where("mtb_event_status_id", MtbEventStatus::NOT_PUBLISH)->where("cooperation_id", auth('cooperation')->user()->id);
        $current_page = "not_publish";
      } elseif($status == "canceled") {
        $events = Event::query()->where("mtb_event_status_id", MtbEventStatus::CANCEL)->where("cooperation_id", auth('cooperation')->user()->id);
        $current_page = "canceled";
      }

      if($requests->event_title) {
        $events->where("title", "LIKE", "%". $requests->event_title . "%");
      }

      if($requests->mtb_municipality_id) {
        $events->where("mtb_municipality_id", $requests->mtb_municipality_id);
      }


      $events = $events->get();



      $mtb_municipalities = MtbMunicipality::all();
      return view("event.event_all_cooperation", [
        "events" => $events,
        "current_page" => $current_page,
        "mtb_municipalities" => $mtb_municipalities,
        "status" => $status
      ]);
    }

    /**
     *
     *イベントの詳細ページ及び申し込みユーザー数の表示。
     *
     */
    public function get_one_event_of_cooperation(Request $request,$id)
    {
      $event = null;
      $event = Event::find($id);
      $tickets = null;
      $current_page = "all";
      $ticket_status = null;

      $tickets = Ticket::query()->whereIn("mtb_ticket_status_id", [MtbTicketStatus::NOT_USED,
                                                                   MtbTicketStatus::USED,
                                                                   MtbTicketStatus::CANCELLED])->where("event_id", $event->id)->get();

     if($request->ticket_status== "cancelled") {
        $tickets = Ticket::query()->where("mtb_ticket_status_id", MtbTicketStatus::CANCELLED)->where("event_id", $event->id)->get();
        $current_page = "cancelled";
        $ticket_status = MtbTicketStatus::CANCELLED;
      }
      $num_tickets = $tickets->count();

      return view("event.event_detail_of_cooperation", ["event" => $event,
                                                        "num_tickets" => $num_tickets,
                                                        "items" => $tickets,
                                                        'current_page' => $current_page,
                                                       ]);
     }

    public function search_event_coop(Request $request)
    {
      $mtb_municipalities = MtbMunicipality::all();

      $events = [];

      $event_title = $request->event_title;
      $event_area_id = $request->mtb_municipality_id;

      if ($event_title && $event_area_id == 'none')
      {
        $events = Event::query()->where("title", "like", "%$event_title%")->where("cooperation_id", auth('cooperation')->user()->id)->get();
      }
      elseif ($event_title  && $event_area_id != 'none')
      {
        $events = Event::query()->where("title", "like", "%$event_title%")->where("mtb_municipality_id", $event_area_id)->where("cooperation_id", auth('cooperation')->user()->id)->get();
      }
      elseif (empty($event_title) && $event_area_id != 'none')
      {
        $events = Event::query()->where("mtb_municipality_id", $event_area_id)->where("cooperation_id", auth('cooperation')->user()->id)->get();
      }
    return view("event.event_all_cooperation", ["events" => $events, "mtb_municipalities" => $mtb_municipalities, "current_page" => null, /*"search_title" => $event_title*/]);
    }


    public function create(Request $request)
    {
      if($request->isMethod("POST")){
        $validator_rules = [
          "mtb_municipality_id" => "required|integer",
          "mtb_event_status_id" => "required|integer",
          "title" => "required",
          "start_at" => "required",
          "maximum" => "required|integer",
          "minimum" => "required|integer",
          "cost" => "required|integer",
          "detail" => "required",
        ];
        $validator_messages = [
          "mtb_municipality_id.required" => "開催地域を入力してください。",
          "mtb_event_status_id.required" => "開催状態を入力してください。",
          "title.required" => "主題を入力してください。",
          "start_at" => "開催時間を入力してください。",
          "maximum.requierd" => "最大人数を入力してください。",
          "minimum.required" => "最小人数を入力してください。",
          "cost.required" => "参加費を入力してください。",
          "detail.required" => "内容の詳細を入力してください。",
        ];
        $validator=Validator::make($request->all(),$validator_rules,$validator_messages);
        if($validator->fails()){
          return redirect(route("get_event_create"))->withInput()->withErrors($validator);
        }
        $event = new Event;
        $event->cooperation_id = $request->cooperation_id;
        $event->mtb_municipality_id = $request->mtb_municipality_id;
        $event->mtb_event_status_id = $request->mtb_event_status_id;
        $event->title = $request->title;
        $event->start_at = $request->start_at;
        $event->maximum = $request->maximum;
        $event->minimum = $request->minimum;
        $event->cost = $request->cost;
        $event->detail = $request->detail;
        $picture1 = $request->file('picture1');
        if($picture1) {
          $realPath = $picture1->getRealPath();
          $ext = $picture1->getClientOriginalExtension();
          $filename = date('YmdHis') . '-' . uniqid(). '.' . $ext;
          Storage::disk('public')->put($filename, file_get_contents($realPath));
          $event->picture1 = $filename;
        }
        $picture2 = $request->file('picture2');
        if($picture2) {
          $realPath = $picture2->getRealPath();
          $ext = $picture2->getClientOriginalExtension();
          $filename = date('YmdHis') . '-' . uniqid(). '.' . $ext;
          Storage::disk('public')->put($filename, file_get_contents($realPath));
          $event->picture2 = $filename;
        }
        $picture3 = $request->file('picture3');
        if($picture3) {
          $realPath = $picture3->getRealPath();
          $ext = $picture3->getClientOriginalExtension();
          $filename = date('YmdHis') . '-' . uniqid(). '.' . $ext;
          Storage::disk('public')->put($filename, file_get_contents($realPath));
          $event->picture3 = $filename;
        }
        // foreach ($picture as $key => $value) {
        //   if (!empty($value)) {
        //     if($value->isValid()) {
        //     $originaName = $value->getClientOriginalName();
        //     $ext = $value->getClientOriginalExtension();
        //     $type = $value->getClientMimeType();
        //     $realPath = $value->getRealPath();
        //     $filename = md5(date('YmdHis') . '-' . uniqid()). '.' . $ext;
        //     Storage::disk('public')->put($filename, file_get_contents($realPath));
        //     $obj = 'picture'.($key+1);
        //     $event->$obj = $filename;
        //     }
        //   }
        // }
        $event->save();
        $event_id = $event->id;
        $event_title = $event->title;
        $event_sup = $event->cooperation->name;
        Mail::to($event->cooperation->mail)->send(new EventNotification($event_id, $event_title, $event_sup));
        return view("event.register_event_finish");
      }
      return view("cooperation.newevent", ["mtb_event_statuses" => MtbEventStatus::get_create_statuses(), "mtb_municipalities" =>MtbMunicipality::all(),]);
    }





    //   // TODO ログインロジックを実装したあとに、該当法人IDはセッションから取得するように変更する。
    //   $cooperation = Cooperation::find(1);
    //
    //   return view('cooperation.newevent', [
    //     "cooperation"=>$cooperation,
    //     "mtbmuncipality"=>MtbMunicipality::all(),
    //     "mtbeventstatu"=>MtbEventStatus::get_create_statuses(),
    //   ]);
    // }

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
     $event->picture1 = $request->file('picture1');
     $event->picture2 = $request->file('picture2');
     $event->picture3 = $request->file('picture3');
     $event->save();
     return view('tmp_blade.successed');
    }
    public function update_event(Request $request, $id)
    {
       $event=Event::find($id);
       return view('cooperation.updateevent', [
       'data' => $event,
       "mtb_event_status" =>MtbEventStatus::all(),
       "mtb_municipality" =>Mtbmunicipality::all()
      ]);
    }
  }
