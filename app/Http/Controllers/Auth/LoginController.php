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
    protected $redirectTo;
    public function redirectTo()
    {

        $type = Auth::user()->type;

        /*switch(Auth::user()-> type){
              case  'admin':
                 $this-> redirectTo = '/admin';
                  return  $this-> redirectTo;
                  break;
              case 'general_user' :
                  $this-> redirectTo = '/generaluser';
                  return  $this-> redirectTo;
                   break;
              case  'business':
                  $this-> redirectTo = '/business';
                  return  $this->$redirectTo;
                   break;
              case  'individual_contractor':
                $this-> redirectTo = '/individualcontractor';
                return  $this-> redirectTo;
                break;
               default:
                $this->redirectTo = '/login';
                return $this->redirectTo;*/

        if ($type == 'admin') {
            return '/admin';
        } elseif ($type == 'general_user') {
            return '/home';
        } elseif ($type == 'business') {
            return  '/home';
        } elseif ($type == 'individual_contractor') {
            return  '/individualcontractor';
        } else {
            return '/';
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}