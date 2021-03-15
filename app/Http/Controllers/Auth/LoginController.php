<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            'password'  => 'required|min:6'
        ]);
        $user = User::join('emails', 'email', 'emails.email')
            ->where('email', $request->input('email'))
            ->first();
        Auth::login($user);
        return redirect()->route('home');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}