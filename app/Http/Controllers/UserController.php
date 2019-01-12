<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailConfirm;
use Validator;
use App\Model\Master\MtbUserStatus;
use App\Model\Master\MtbArea;
use App\Model\User\UserDetail;

class UserController extends Controller
{
  /**
   *
   *仮登録。
   *
   */
  public function create(Request $request)
  {
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

    return view("user.isCreateSuccessed");
  }

  /**
   *
   *登録状態の変更及び本登録画面への遷移。
   *
   */
  public function go_to_register(Request $request,$token)
  {

    $user = User::query()->where("token", $token)->firstOrFail();

    if($user->mtb_user_status_id!=MtbUserStatus::REAL_USER){

    $user->mtb_user_status_id = MtbUserStatus::DETAIL_NOT_INPUT;
    $user->save();

    return view("user.register", [
      "mtb_areas" => MtbArea::all(),
      "user_id" => $user->id,
      'token'=>$token
    ]);
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
      "lastname_reading" => "required|min:2|max:50",
      "firstname" => "required",
      "nickname" => "required|min:3|max:15|unique:user_details,nickname",
      "gender_flg" => "required|integer",
      "birthday" => "required|date_format:Y-m-d",
      "mtb_area_id" => "required|integer",
    ];
    $validator_messages = [
      "lastname.required" => "lastnameを入力してください。",
      "lastname_reading.required" => "フリガナを入力してください。",
      "lastname.min" => ":min文字以上入力してください。",
      "firstname.required" => "firstnameを入力してください。",
      "nickname.required" => "ニックネームを入力してください。",
      "gender_flg.required" => "性別を入力してください。",
      "birthday.required" => "生年月日を入力してください。",
      "mtb_area_id.required"=>"出身地を選択してください。"
    ];

    $validator=Validator::make($request->all(),$validator_rules,$validator_messages);
    if($validator->fails()){
      return redirect(route('get_mail_confirm',['token'=>$request->user_token]))->withInput()->withErrors($validator);
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

    if($user_detail->save()){
      $user_detail->user->mtb_user_status_id=MtbUserStatus::REAL_USER;
      $user_detail->user->save();
    }

    return view("user.registerSuccessed");
  }
}
