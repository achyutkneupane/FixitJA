<?php

/**
 * Author : Ashish Pokhrel
 * Date :   3 feb 2021
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;
use App\Mail\ResponseEmail;

class MailController extends Controller
{
    public static function sendVerifyEmail($name, $email, $verification_code)
    {
        $subject = "Verify Email";
        $data =  [
            'name' => $name,
            'verification_code' => $verification_code,

        ];
        //dd($verfication_code);
try{
        Mail::send('auth.verifyuser', $data, function ($message) use ($email, $subject) {
            $message->to($email)->subject($subject);
        });
    }

catch (Exception $ex){
    dd($ex);
}
}

public static function sendResponseEmail($name, $email)
{
     $subject = "About profile details";
        $data =  [
            'name' => $name,
            
            

        ];

        try{
        Mail::send('mail.responseemail', $data, function ($message) use ($email, $subject) {
            $message->to($email)->subject($subject);
        });
    }

catch (Exception $ex){
    dd($ex);
}

}
}