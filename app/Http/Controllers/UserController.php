<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailConfirm;
use App\Model\Master\MtbUserStatus;
use App\Model\Master\MtbArea;
use App\Model\Master\MtbTicketStatus;
use App\Model\User\UserDetail;
use App\Model\Ticket\Ticket;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Validator;

class UserController extends Controller
{
  /**
   *
   *ホームページ画面。
   *
   */
  public function index(Request $request)
  {
    return view('others.index.index');
  }

  /**
   *
   *ログイン画面。
   *
   */
  public function ready_to_login(Request $request)
  {
    if(Auth::guard('user')->check()){

      return redirect(route('get_event_book'));
    }
    return view('user.login');
  }
  /**
   *
   *ログイン機能。
   *
   */
  public function do_login(Request $request)
  {
    $validator_rules = [
      "mail" => "required|email",
      "password" => "required"
    ];

    $validator_messages = [
      "mail.required" => "メールを入力してください。",
      "mail.email" => "メールの形式が正しくありません。",
      "password.required" => "パスワードを入力してください。",
    ];

    $validator = Validator::make($request->all(),$validator_rules,$validator_messages);
    if($validator->fails()){

      return redirect(route('get_user_login'))->withInput()->withErrors($validator);
    }

   //ここからユーザーのログイン認証を行う。
   $arr = [
     "mail" => $request->mail,
     "password" => $request->password,
     "mtb_user_status_id" => MtbUserStatus::REAL_USER
   ];

    if (Auth::guard("user")->attempt($arr,$request->remember_me)){
      return redirect(route("get_event_book"));
    } else {
      return redirect(route('get_user_login'))->withInput()->withErrors($validator);
    }
  }

  /**
   *
   *ログアウト処理。
   *
   */
   public function logout(Request $request)
   {
     Auth::guard('user')->logout();
     return redirect(route('get_event_book'));
   }

  /**
   *
   *仮登録画面。
   *
   */
  public function create(Request $request)
  {
    if(Auth::guard('user')->check()){

      return redirect(route('get_event_book'));
    }
    return view("user.create");
  }

  /**
   *
   *入力情報の正否の検証及び確認メールの送信
   *
   */
  public function send_verify_mail(Request $request)
  {

    $validation_rules = [
      "mail" => "required|email|unique:users,mail",
      "password" => "required|min:8|confirmed"
    ];

    $validation_messages = [
      "mail.required" => "メールを入力してください。",
      "mail.email" => "メールの形式が正しくないです。",
      "mail.unique" => "該当メールがすでに存在しました。",
      "password.required" => "パスワードを入力してください。",
      "password.min" => "8桁以上の文字を入力してください",
      "password.confirmed" => "パスワードが一致していません。"
    ];


    $validator = Validator::make($request->all(), $validation_rules, $validation_messages);

    if($validator->fails()) {
      return redirect()->back()->withInput()->withErrors($validator);;
    }

    $user = new User;

    $user->mail = $request->mail;
    $user->set_password($request->password);
    $user->create_token();
    $user->mtb_user_status_id = MtbUserStatus::MAIL_NOT_CONFIRMED;
    $user->save();

    $text = "下のリンクをクリックして、メール承認してください。";
    $token = $user->token;
    $to = $user->mail;


    Mail::to($to)->send(new MailConfirm($text, $token));
    return view("user.create_successed");
  }

  /**
   *
   *ユーザー状態の更新及び本登録画面への遷移。
   *
   */
  public function go_to_register(Request $request,$token)
  {

    $user = User::query()->where("token", $token)->whereIn("mtb_user_status_id",[MtbUserStatus::MAIL_NOT_CONFIRMED, MtbUserStatus::DETAIL_NOT_INPUT])->first();
    if($user){
      $user->mtb_user_status_id = MtbUserStatus::DETAIL_NOT_INPUT;
      $user->save();
      return view("user.register", [
        "mtb_areas" => MtbArea::all(),
        "user_id" => $user->id,
        'token'=>$token
      ]);
    } else {
      return view("welcome");
    }
  }

  /**
   *
   *本登録。
   *
   */
  public function register(Request $request)
  {

    $validator_rules = [
      "lastname" => "required|max:30",
      "lastname_reading" => "required|max:50",
      "firstname" => "required|max:30",
      "firstname_reading" => "required|max:50",
      "nickname" => "required|unique:user_details,nickname",
      "gender_flg" => "required|integer",
      "birthday" => "required|date_format:Y-m-d",
      "mtb_area_id" => "required|integer",
    ];
    $validator_messages = [
      "lastname.required" => "姓を入力してください。",
      "lastname.max" => "姓を:max文字以内で入力してください。",
      "lastname_reading.required" => "姓(フリガナ)を入力してください。",
      "lastname_reading.max" => "姓(フリガナ)を:max文字以内で入力してください。",
      "firstname.required" => "名を入力してください。",
      "firstname.max" => "名を:max文字以内で入力してください。",
      "firstname_reading.required" => "名(フリガナ)を入力してください。",
      "firstname_reading.max" => "名(フリガナ)を:max文字以内で入力してください。",
      "nickname.required" => "ニックネームを入力してください。",
      "nickname.unique" => "このニックネームは既に存在しています。",
      "gender_flg.required" => "性別を選択してください。",
      "gender_fig.integer" => "性別を選択してください。",
      "birthday.required" => "生年月日を入力してください。",
      "birthday.date_format" => "生年月日の形式が間違っています。",
      "mtb_area_id.required" => "出身地を選択してください。",
      "mtb_area_id.integer" => "出身地を選択してください。"

    ];

    $validator = Validator::make($request->all(), $validator_rules, $validator_messages);
    if($validator->fails()){
      return redirect()->back()->withInput()->withErrors($validator);
    }

    $user_detail = new UserDetail;
    $user_detail->user_id = $request->user_id;
    $user_detail->lastname = $request->lastname;
    $user_detail->firstname = $request->firstname;
    $user_detail->lastname_reading = $request->lastname_reading;
    $user_detail->firstname_reading = $request->firstname_reading;
    $user_detail->mtb_area_id = $request->mtb_area_id;
    $user_detail->address = $request->address;
    $user_detail->phone_no = $request->phone_no;
    $user_detail->gender_flg = $request->gender_flg;
    $user_detail->birthday = $request->birthday;
    $user_detail->nickname = $request->nickname;
    $user_detail->save();

    $user_detail->user->mtb_user_status_id = MtbUserStatus::REAL_USER;
    $user_detail->user->save();

     return view("user.register_successed");
  }

  /**
   *
   *ユーザー情報の更新。
   *
   */
  public function update(Request $request)
  {

  }

}
