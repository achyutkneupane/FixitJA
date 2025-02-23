<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\ToastHelper;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Mail\VerifyEmail;
use App\Models\Email;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $user = User::find(Auth::user()->id);
        if ($user->status == "pending") {
            return view('auth.resendemail', compact('user'));
        } else {
            return redirect()->route('home');
        }
    }
    public function resendVerifyEmail()
    {
        $user = auth()->user();
        if ($user != null) {
            $data =  [
                'name' => $user->name,
                'verification_code' => $user->verification_code,
                'email' => $user->email()
            ];
            Mail::to($data['email'])->send(new VerifyEmail($data));
            ToastHelper::showToast('Verification email sent successfully.');
            return redirect()->route('home');
        }
        return redirect()->route('resendEmail')->with(session()->flash('alert-danger', 'Something went wrong!'));
    }
    public function verifyMultiEmail($email)
    {
        $user = auth()->user();
        if ($user != null) {
            MailController::sendVerifyEmail($user->name, $email, $user->verification_code);
            ToastHelper::showToast('Verification email sent successfully.');
            return redirect()->back();
        }
        return redirect()->route('resendEmail')->with(session()->flash('alert-danger', 'Something went wrong!'));
    }
    public function verifyUser($verification_code, $email)
    {
        $user = User::where(['verification_code' => $verification_code])->first();
        $checkEmail = Email::where(['user_id' => $user->id, 'email' => $email])->first();
        if (empty($checkEmail)) {
            ToastHelper::showToast('Email not matched with account.', 'error');
            return auth()->check() ? redirect()->route('home') : redirect()->route('login');
        } elseif ($user != null) {
            $user->email_verified_at =  Carbon::now();
            $user->save();
            foreach ($user->emails()->get() as $email) {
                $email->update(['verified'=>TRUE]);
            }
            $checkEmail->update(['verified'=>TRUE]);
            ToastHelper::showToast('Account has been verified');
            if (!empty(Auth::user()))
                return redirect()->route('home');
            else
                return redirect()->route('login');
        } else
            return redirect()->route('login')->with(session()->flash('alert-danger', 'Invalid verification code!'));
    }
}