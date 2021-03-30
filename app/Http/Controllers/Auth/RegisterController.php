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
use Illuminate\Support\Facades\Auth;
use App\Events\UserRegistered;
use App\Helpers\LogHelper;
use App\Helpers\ToastHelper;
use App\Models\Email;

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:emails,email'],
            'phone' => ['required', 'string', 'min:8', 'unique:phones,phone'],
            /* Add by Ashish Pokhrel */
            'type' => ['required' ,Rule::in(['admin', 'independent_contractor', 'Business', 'general_user'])],
            'gender' => ['nullable', 'string'],
            'companyname' => ['nullable', 'string'],
            'websitepersonal' => ['nullable'],
            'websitecompany' => ['nullable'],
            'password' => [  'required',
                              'min:6',             
                              'regex:/[A-Z]/',      
                              'regex:/[0-9]/', 
                              'confirmed'
                             ]   
                              
         

        ]);
        $user = User::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'companyname' => $request->companyname,
            'type' => $request->type,
            'status' => 'new',
            'password' => Hash::make($request->password),
            'verification_code' => sha1(time())
        ]);
        $user->emails()->create([
            'email' => $request->email,
            'primary' => true
        ]);
      
      
        $user->phones()->create([
            'phone' => $request->phone,
            'primary' => true
        ]);
       

        // event(new UserRegistered($user));
        try {
            MailController::sendVerifyEmail($user->name, $request->email, $user->verification_code);
        } catch (\Throwable $t) {
            LogHelper::store('Register', $t);
        }
        Auth::login($user);
        return redirect('/home');
    }
}
