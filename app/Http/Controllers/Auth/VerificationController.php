<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\ToastHelper;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
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
        if ($user->status == "pending") {
            return view('auth.resendemail', compact('user'));
        } else {
            return redirect()->route('home');
        }
    }
    public function resendVerifyEmail(Request $request)
    {
        $user = Auth::user();
        if ($user != null) {
            MailController::sendVerifyEmail($user->name, $user->email, $user->verification_code);
            ToastHelper::showToast('Verification email sent successfully.');
            return redirect()->route('home');
        }
        return redirect()->route('resendEmail')->with(session()->flash('alert-danger', 'Something went wrong!'));
    }
    public function verifyUser($verification_code)
    {
        $user = User::where(['verification_code' => $verification_code])->first();
        if ($user != null) {
            $user->status = 'active';
            $user->email_verified_at =  Carbon::now();
            $user->save();
            ToastHelper::showToast('Account has been verified');
            if (!empty(Auth::user()))
                return redirect()->route('home');
            else
                return redirect()->route('login');
        }
        return redirect()->route('login')->with(session()->flash('alert-danger', 'Invalid verification code!'));
    }
}