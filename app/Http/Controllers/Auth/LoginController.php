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
use Illuminate\Support\Facades\Validator;
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
        } elseif ($type == 'independent_contractor') {
            return  '/home';
        } else {
            return '/login';
        }
    }
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|exists:emails,email',
            'password'  => 'required'
        ],[
            'exists' => 'This :attribute doesnt exists. Please try again.'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $AuthUser = User::join('emails', 'email', 'emails.email')
                ->where('email', $request->email)
                ->first();
            if($AuthUser) {
                $user = User::find($AuthUser->id);
                if($user->status == "deleted")
                {
                    return redirect()->route('login')->withErrors(['email' => 'Your account has been deleted.']);
                }
                else if($user->status == "suspended")
                {
                    return redirect()->route('login')->withErrors(['email' => 'Your account has been suspended.']);
                }
                if($user->status == "blocked")
                {
                    return redirect()->route('login')->withErrors(['email' => 'You have been blocked from logging in.']);
                }
                else {
                    if(Hash::check($request->password, $user->password)) {
                        Auth::login($AuthUser);
                        return redirect()->route('home');
                    }
                    else {
                        return redirect()->route('login')->withErrors(['password' => 'Password is incorrect. Please try again.']);
                    }
                }
            }
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}