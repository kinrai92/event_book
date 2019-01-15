<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Model\Cooperation\Cooperation;
use App\Model\Master\MtbArea;
use App\Model\Master\MtbIndustryType;
use App\Model\Master\MtbStaffTotal;
use Illuminate\Support\Facades\Auth;


use Validator;

class CooperationController extends Controller
{
  /**
   *
   *ホームページ画面。
   *
   */
  public function index(Request $request)
  {
    return view('others.index.cooperationindex');
  }
  /**
   *
   *ログイン画面。
   *
   */
  public function ready_to_login(Request $request)
  {
    return view('cooperation.cooperlogin');
  }
  /**
   *
   *ログイン機能。
   *
   */
  public function cooper_login(Request $request){

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

      return redirect(route('get_cooperation_login'))->withInput()->withErrors($validator);
    }
    $arr = [
      "mail" => $request->mail,
      "password" => $request->password,
    ];

     if(Auth::attempt($arr)){
       return redirect(route("get_after_cooperlogin"));
     } else {
       return redirect(route('get_cooperation_login'))->withInput()->withErrors($validator);
     }
   }

   public function logout(Request $request)
   {
     Auth::guard('cooperation')->logout();
     return view('');
   }
  /**
   *
   *登録画面へ遷移する。
   *
   */
  public function create(Request $request)
  {

    $areas = MtbArea::all();
    $staff_totals = MtbStaffTotal::all();
    $industry_types = MtbIndustryType::all();

    return view("cooperation.register",[
      'areas'=>$areas,
      'staff_totals'=>$staff_totals,
      'industry_types'=>$industry_types
    ]);
  }

  /**
   *
   *本登録。
   *
   */
  public function register(Request $request)
  {

    $validator_rules = [
      "mail" => "required|email|unique:cooperations,mail",
      "password" => "required|min:8|confirmed",
      "name" => "required|unique:cooperations,name",
      "reading" => "required",
      "mtb_area_id" => "required",
      "address" => "required",
      "established_at" => "required",
      "mtb_staff_total_id"=>"required",
      "mtb_industry_type_id"=>"required",
      "business"=>"required",
      "representative_name"=>"required",
      "rn_reading"=>"required",
      "tel_number"=>"required|min:10|max:11|unique:cooperations,tel_number",
      "fax_number"=>"required"
    ];
    $validator_messages = [
      "mail.required" => "メールを入力してください。",
      "mail.email" => "メールの形式が正しくないです。",
      "mail.unique" => "該当メールがすでに存在しました。",
      "password.required" => "パスワードを入力してください。",
      "password.min" => "8桁以上の文字を入力してください",
      "password.confirmed" => "パスワードが一致していません。",
      "name.required" => "会社の名前を入力してください。",
      "name.unique"=>"該当会社は既に登録されています。",
      "reading.required"=>"会社の名前(フリガナ)を入力してください。",
      "mtb_area_id.required"=>"都道府県を選択してください。",
      "address.required"=>"住所の詳細を入力してください。",
      "established_at.required"=>"設立年を選択してください。",
      "mtb_staff_total_id.required"=>"従業員数を選択してください。",
      "mtb_industry_type_id.required"=>"業種を選択してください。",
      "business.required"=>"事業内容を選択してください。",
      "representative_name.required"=>"代表者氏名を入力してください。",
      "rn_reading.required"=>"代表者氏名(フリガナ)を入力してください。",
      "tel_number.required"=>"電話番号を入力してください。",
      "tel_number.min"=>":min桁か:max桁の電話番号を入力してください。",
      "tel_number.max"=>":min桁か:max桁の電話番号を入力してください。",
      "tel_number.unique"=>"この電話番号は既に登録されています。",
      "fax_number.required"=>"FAX番号を入力してください。"

    ];

    $validator=Validator::make($request->all(),$validator_rules,$validator_messages);
    if($validator->fails()){
      return redirect(route('get_cooperation_register'))->withInput()->withErrors($validator);
    }

    $cooperation = new Cooperation;
    $form=array();
    foreach ($request->all() as $key => $value) {
        if($key=="_token"|
           $key=="submit"|
           $key=="password_confirmation"){
           continue;
        }
        if($key=="password"){
           $form[$key]=Hash::make($value);
        }else{
           $form[$key]=$value;
        }
    }
     $cooperation->fill($form)->save();

     return view("cooperation.registerSuccessed");
  }



}
