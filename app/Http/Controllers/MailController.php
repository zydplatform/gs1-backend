<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use Mail;
use App\Http\Requests;
use App\Mail\Gs1Mail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;


class MailController extends Controller {

   public static function sendsignupEmail($name, $email, $verification_code){
      $data =[
         'name' => $name,
         'verification_code' => $verification_code
               ];
      Mail::to($email)->send(new Gs1Mail($data));
   }
}