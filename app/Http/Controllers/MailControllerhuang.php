<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\MailSender;

class MailController extends Controller
{

     protected function TmpCreate(){

       return view('tmp_blade.usermail');
     }

    protected function create(){

      return view('tmp_blade.user_register');
    }

     public function MailSender(Request $request){


       $token=$request->token;
       $to=$request->mail;

       Mail::to($to)->send(new MailSender($token));
     }
}
