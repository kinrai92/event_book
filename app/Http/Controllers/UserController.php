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
  public function create(Request $request)
  {
    return view("userlogin.usermail");
  }

  public function sendmail(Request $request)
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

    return view("userlogin.succeed");
  }

  public function mail_confirm(Request $request, $token)
  {
    $user = User::query()->where("token", $token)->firstOrFail();
    $user->mtb_user_status_id = MtbUserStatus::DETAIL_NOT_INPUT;
    $user->save();


    return view("user.mail_confirm", [
      "mtb_areas" => MtbArea::all(),
      "user_id" => $user->id
    ]);
  }

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
    ];

    $validator=Validator::make($request->all(),$validator_rules,$validator_messages);
    if($validator->fails()){
      return redirect(route("get_user_create"))->withInput()->withErrors($validator);
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

    return view("user.register_success");
  }

}
