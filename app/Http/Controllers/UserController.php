<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailConfirm;
use Validator;
use App\Model\Master\MtbUserStatus;


class UserController extends Controller
{
  public function create(Request $request)
  {
    return view("userlogin.usermail");
  }

  public function sendmail(Request $request){

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

  public function mail_confirm(Request $request, $token) {
    $user = User::query()->where("token", $token)->firstOrFail();
    $user->mtb_user_status_id = MtbUserStatus::DETAIL_NOT_INPUT;
    $user->save();
    return view("html.register_user");
  }

  public function register(Request $request)
  {

  }



}
