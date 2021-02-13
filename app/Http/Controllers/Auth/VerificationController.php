<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
    public function resend()
    {
        $user = Auth::user();
        return view('auth.resendemail', compact('user'));
    }
    public function resendVerifyEmail(Request $request)
    {
        $user = Auth::user();
        if ($user != null) {
            MailController::sendVerifyEmail($user->name, $request->email, $user->verification_code);
            return redirect()->route('login')->with(session()->flash(
                'alert-success',
                'Verification email has been resent. Please check your email'
            ));
        }
        return redirect()->route('resendEmail')->with(session()->flash('alert-danger', 'Something went wrong!'));
    }
}