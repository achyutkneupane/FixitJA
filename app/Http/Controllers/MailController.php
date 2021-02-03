<?php
/**
 * Author : Ashish Pokhrel
 * Date :   3 feb 2021
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;

class MailController extends Controller
{
    public static  function  sendverfiyEmail($name, $email, $verfication_code){
        $data =  [
            'name' => $name,
            'verfication_code' => $verfication_code
        ];
        Mail::to($email)->send(new  VerifyEmail($data));
    }
    
}
