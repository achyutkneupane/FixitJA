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

use App\Models\Refer;
use Illuminate\Support\Str;




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
                              'confirmed',

                            ],
            ]);

        /* if someone refer */
        if($request->referralemail){
            $referrall = Email::with('user')->where('email',$request->referralemail)->first();
            if($referrall) {
                $referral = $referrall->id;
                $refer = Refer::where('referred_by',$referral)->where('email',$request->email)->first();
                if($refer) {
                    $refer->registered = true;
                    $refer->save();
                    Refer::where('email',$request->email)->where('registered',false)->delete();
                }
                else {
                    Refer::create([
                        'referred_by' => $referrall->user->id,
                        'email' => $request->email,
                        'token' => Str::random(15),
                        'registered' => true
                    ]);
                }
            }
            else {
                return redirect()->back()->withErrors(['referralemail'=>["This e-mail doesn't exist"]])->withInput();
            }
        }

        $user = User::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'companyname' => $request->companyname,
            'type' => $request->type,
            'status' => 'new',
            'password' => Hash::make($request->password),
            'verification_code' => sha1(time())
        ]);
        

        /* if someone refer */
        if($request->referralemail){
 
        $referral = Email::with('user')->where('email',$request->referralemail)->first()->id;
        $refer = Refer::where('referred_by',$referral)->where('email',$request->email)->first();
        $refer->registered = true;
        $refer->save();
        Refer::where('email',$request->email)->where('registered',false)->delete();

        }
        


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
