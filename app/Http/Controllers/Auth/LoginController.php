<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}