<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Mail;
use App\Mail\MailSender;

class MailController extends Controller
{
    //
    public function sendmail(){
      $name="huang";
      $text="you are handsome";
      $to="hjwkky4869@gmail.com";
      Mail::to($to)->send(new MailSender($name,$text));


    }
}
