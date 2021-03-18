<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\LogHelper;
use App\Helpers\ToastHelper;
use App\Http\Controllers\Controller;
use App\Models\Email;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Carbon\Carbon;
use Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;

use function PHPUnit\Framework\isNull;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    public function __construct()
    {
        $this->middleware('guest');
    }




    public function getPassword($token)
    {
        $page_title = "Reset Password";
        $updatePassword = DB::table('password_resets')->where(['token' => $token]);
        if(empty($updatePassword->first())) {
            ToastHelper::showToast('Invalid Token.','error');
            return redirect()->route('forget-password');
        }
        return view('auth.passwords.reset', compact('page_title','token'));
    }

    public function updatePassword(Request $request)
    {
        try {
            $request->validate([
                'token' => 'required',
                'password' => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required',
            ]);
            $updatePassword = DB::table('password_resets')->where(['token' => $request->token]);
            if(empty($updatePassword->first())) {
                ToastHelper::showToast('Invalid Token.','error');
                return back()->withInput();
            }
            Email::where('email', $updatePassword->first()->email)->first()->user->update(['password' => Hash::make($request->password)]);
            $updatePassword->delete();
            ToastHelper::showToast('Your password has been changed!');
            return redirect('/login');
        } catch(Throwable $e) {
            LogHelper::store('ResetPassword',$e);
            return back()->withInput();
        }
    }
}