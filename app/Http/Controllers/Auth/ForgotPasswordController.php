<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\ToastHelper;
use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getEmail()
    {
        return view('auth.passwords.email');
    }

    public function postEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email|exists:emails,email',
        ],[
            'exists' => 'This :attribute doesnt exists. Please try again.'
        ]);
        if ($validator->fails())
            return redirect()->back()->withErrors($validator);
        $token = Str::random(32);

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        );
        Mail::to($request->email)->send(new ResetPassword($token));
        ToastHelper::showToast('Forget Password email has been sent. Please check your MailBox.');
        return redirect()->route('login');
    }
}