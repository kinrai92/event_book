<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Event\Event;
use App\Model\User\User;
use App\Model\Cooperation\Cooperation;
use App\Model\Ticket\Ticket;
use App\Model\Master\MtbMunicipality;
use App\Model\Master\MtbEventStatus;
use Illuminate\Support\Facades\Mail;
use App\Mail\EventNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Validator;
class EventController extends Controller
{
    public function events(Request $request, $status = null) {

      $mtb_municipalities = MtbMunicipality::all();

      $events = null;
      $current_page = "all";
      if(!$status) {
        $events = Event::query()->whereIn("mtb_event_status_id", [MtbEventStatus::PUBLISH, MtbEventStatus::CANCEL]);
      } elseif($status == "opening") {
        $events = Event::query()->where("mtb_event_status_id", MtbEventStatus::PUBLISH)->where("start_at", ">=", Carbon::now());
        $current_page = "opening";
      } elseif($status == "held") {
        $events = Event::query()->where("mtb_event_status_id", MtbEventStatus::PUBLISH)->where("start_at", "<", Carbon::now());
        $current_page = "held";
      } elseif($status == "canceled") {
        $events = Event::query()->where("mtb_event_status_id", MtbEventStatus::CANCEL);
        $current_page = "canceled";
      }

      if($request->event_title) {
        $events->where("title", "LIKE", "%" . $request->event_title . "%");
      }

      if($request->mtb_municipality_id) {
        $events->where("mtb_municipality_id", $request->mtb_municipality_id);
      }

      if($request->cooperation_name) {

        $cooperation_name = $request->cooperation_name;

        $events->whereHas("cooperation", function ($query) use($cooperation_name) {
            $query->where('name', 'like', '%' . $cooperation_name . '%');
        });
      }

      $events = $events->get();
      return view("event.event_all", ["events" => $events, "current_page" => $current_page, "mtb_municipalities" => $mtb_municipalities, "status" => $status]);
    }

    public function get_one_event(Request $request, $id) {
      $event = null;
      $event = Event::find($id);
      $tickets = Event::find($id)->tickets;
      $stock = $event->maximum - $tickets->count();
      $ticketCount = Ticket::where("event_id",$id)
                            ->where("user_id",auth('user')->user()->id)
                            ->count();
      return view("event.event_detail", ["event" => $event, "tickets" => $tickets, "stock" => $stock, "ticketCount" => $ticketCount]);
    }

    public function events_cooperation(Request $request, $status = null) {

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
      $tickets = Ticket::query()->where("event_id", $id)->paginate(2);
      $num_tickets = $tickets->count();
      return view("event.event_detail_of_cooperation", ["event" => $event, "num_tickets" => $num_tickets,"tickets" => $tickets]);
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

    public function show_index(Request $request)
    {
      $tickets = Ticket::orderBy('created_at','desc')->simplePaginate(2);
      $events = Event::orderBy('start_at','desc')->simplePaginate(2);
      return view('others.index.index',["events"=>$events,"tickets"=>$tickets]);
    }

  }
