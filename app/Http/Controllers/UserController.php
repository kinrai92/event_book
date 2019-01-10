<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailSender;
use App\User;
use Validator;

class UserController extends Controller
{


    protected function tmpCreate(Request $request){

       if($request->isMethod('post')){

            $validator_rules=[

              'mail'=>'required|regex:/^.+@.+$/i|unique:users,mail',
              'password'=>'required|required_with:password_confirmation|same:password_confirmation|min:8',
            ];

            $validator_messages=[

              'mail.required'=>"このメールアドレスを入力してください。",
              'mail.regex'=>"メールアドレスの形式が間違っています。",
              'mail.unique'=>"このメールアドレスは既に存在しています。",
              'password.required'=>"パスワードが入力されていません。",
              'password.same'=>"パスワードが異なっています。",
              'password.min'=>":min以上入力してください。"
            ];

            $validator=Validator::make($request->all(),$validator_rules,$validator_messages);

            if($validator->fails()){

              return redirect(route('tmp_user_create'))->withInput()->withErrors($validator);
            }

              $user=new User;
              $user->mail=$request->mail;
              $user->password=md5($request->password);
              $user->mtb_user_status_id=1;
              $user->token=$request->token;
              $user->save();

            Mail::to('hjwkky4869@gmail.com')->send(new MailSender($request->token));


      }else{

            return view('tmp_blade.usermail');

           }
    }

     protected function verify($token){

        $user=User::tokenEqual($token)->first();

        if($user && $user->mtb_user_status_id!=3){

           $user->mtb_user_status_id=2;
           $user->save();

           return view('tmp_blade.user_register',['token'=>$token]);

        }else{

           echo "Error!";
        }
    }


     protected function create(Request $request,$token){

          $validator_rules=[

              'lastname'=>'required',
              'firstname'=>'required',
              'lastname_reading'=>'required',
              'firstname_reading'=>'required',
              'mtb_area_id'=>'required',
              'address'=>'required',
              'phone_no'=>'required|min:10|max:11|unique:users,phone_no',
              'gender_flg'=>'required',
              'birthday'=>'required',
              'nickname'=>'required|unique:users,nickname'

          ];

          $validator_messages=[

              'lastname.required'=>"姓を入力してください。",
              'firstname.required'=>"名を入力してください。",
              'lastname_reading.required'=>"姓のフリガナを入力してください。",
              'firstname_reading.required'=>"名のフリガナを入力してください。",
              'mtb_area_id.required'=>"出身地を選択してください。",
              'address.required'=>"住所の詳細を入力してください。",
              'phone_no.required'=>"電話番号を入力してください。",
              'phone_no.min'=>":minか:max桁の電話番号を入力してください。",
              'phone_no.max'=>":minか:max桁の電話番号を入力してください。",
              'phone_no.unique'=>"この番号は既に登録されています。",
              'gender_flg.required'=>"性別を選択してください。",
              'birthday.required'=>"生年月日を入力してください。",
              'nickname.required'=>"ニックネームを入力してください。",
              'nickname.unique'=>"このニックネームは既に存在しています。"

          ];

          $validator=Validator::make($request->all(),$validator_rules,$validator_messages);

          if($validator->fails()){

            return redirect(route('get_user_create',['token'=>$token]))->withInput()->withErrors($validator);
          }

            $user->mtb_user_status_id=3;
            $user->lastname=$request->lastname;
            $user->firstname=$request->firstname;
            $user->lastname_reading=$request->lastname_reading;
            $user->firstname_reading=$request->firstname_reading;
            $user->mtb_area_id=1;
            $user->address=$request->address;
            $user->phone_no=$request->phone_no;
            $user->gender_flg=$request->gender_flg;
            $user->birthday=$request->birthday;
            $user->nickname=$request->nickname;

            $user->save();

            return view('tmp_blade.successed');

        }
}
