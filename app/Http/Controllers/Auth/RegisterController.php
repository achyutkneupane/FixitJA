<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use App\Http\Controllers\MailController;
use Carbon\Carbon;
use Event;
use Auth;
use App\Events\UserRegistered;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
   
    /* Add by Ashish Pokhrel */
    public function register(Request $request)
    {
        

         
         $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'phone' => ['required', 'string', 'min:8', 'unique:users,phone'],
            /* Add by Ashish Pokhrel */
            'type' => Rule::in(['admin', 'individual_contractor', 'Business', 'general_user']),
            'gender' => ['nullable', 'string'],
            'companyname' => ['nullable', 'string'],
            'websitepersonal' => ['nullable'],
            'websitecompany' => ['nullable'],
            'password' => ['min:6|required_with:cpassword|same:cpassword', 'regex:/[A-Z]/','regex:/[0-9]/'],
            'cpassword' => ['min:6','regex:/[A-Z]/','regex:/[0-9]/'],
         

      ]);
      $user = User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'phone' => $request->input('phone'),
        'type'  => $request->input('type'),
        'gender' => $request ->input('gender'),
        'companyname' => $request ->input('companyname'),
        'password' => bcrypt($request->input('password')),
        'verification_code' => sha1(time()),

    
    ]);
    

   
    event(new UserRegistered($user));
    Auth::login($user);

    

    return redirect('/home');
       /* $user = new User();
       
        $user->save();
        

        if ($user != null) {
            MailController::sendVerifyEmail($user->name, $user->email, $user->verification_code);
            //dd({{$user->verfication_code);
            return redirect()->route('login')->with(session()->flash(
                'alert-success',
                'Your account has been created. Please check email for verification link.'
            ));
        }
        return redirect()->route('register')->with(session()->flash('alert-danger', 'Something went wrong!'));*/


    }
    public function verifyuser($verification_code)
    {
        $user = User::where(['verification_code' => $verification_code])->first();


        if ($user != null) {
            $user->status = 'active';
            $user->email_verified_at =  Carbon::now();

            $user->save();
            return redirect()->route('login')->with(session()->flash('alert-success', 'Your account is verified. Please login!'));
        }
        return redirect()->route('register')->with(session()->flash('alert-danger', 'Invalid verification code!'));
    }
}