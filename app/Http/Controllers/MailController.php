<?php

/**
 * Author : Ashish Pokhrel
 * Date :   3 feb 2021
 */

namespace App\Http\Controllers;

use App\Helpers\LogHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;
use App\Mail\ResponseEmail;
use Exception;

class MailController extends Controller
{
    public static function sendVerifyEmail($name, $email, $verification_code)
    {
        $subject = "Verify Email";
        $data =  [
            'name' => $name,
            'verification_code' => $verification_code,
            'email' => $email
        ];
        try {
            Mail::send('auth.verifyuser', $data, function ($message) use ($email, $subject) {
                $message->to($email)->subject($subject);
            });
        } catch (Exception $ex) {
            LogHelper::store('Mail', $ex);
        }
    }




public static function sendResponseEmail($name, $email, $request, $user_subcategories)
{
     $subject = "Your profile Updated";
        $data =  [
            'name' => $name,
            'request'=>$request,
            'user_subcategories' => $user_subcategories
        ];

        try{
        Mail::send('mail.createProfile', compact('data'), function ($message) use ($email, $subject) {
            $message->to($email)->subject($subject);
        });
    }

catch (Exception $ex){
    LogHelper::storeMessage('Email',$ex->getMessage(),auth()->user());
}

}
}