<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\LogHelper;
use App\Helpers\ToastHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    public function redirectTo()
    {

        $type = Auth::user()->type;

        if ($type == 'admin') {
            return '/home';
        } elseif ($type == 'general_user') {
            return '/home';
        } elseif ($type == 'business') {
            return  '/home';
        } elseif ($type == 'individual_contractor') {
            return  '/home';
        } else {
            return '/login';
        }
    }
    public function authenticate(Request $request)
    {
            $user = $request->validate([
                'email'     => 'required',
                'password'  => 'required'
            ]);
            $AuthUser = User::join('emails', 'email', 'emails.email')
                ->where('email', $request->email)
                ->first();
            $user = User::find($AuthUser->id);
            if($user) {
                if($user->status == "deleted")
                {
                    ToastHelper::showToast('Your account has been deleted.','error');
                    return redirect()->route('login');
                }
                else if($user->status == "suspended")
                {
                    ToastHelper::showToast('Your account has been suspended.','error');
                    return redirect()->route('login');
                }
                if($user->status == "blocked")
                {
                    ToastHelper::showToast('You have been blocked from logging in.','error');
                    return redirect()->route('login');
                }
                else {
                    if(Hash::check($request->password, $user->password)) {
                        Auth::login($AuthUser);
                        return redirect()->route('home');
                    }
                    else {
                        ToastHelper::showToast('Password is not correct.','error');
                        return redirect()->route('login');
                    }
                }
            }
            else {
                ToastHelper::showToast('Email doesnot exist. Please recheck.','error');
                return redirect()->route('login');
            }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}