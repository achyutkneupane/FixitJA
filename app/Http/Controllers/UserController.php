<?php

namespace App\Http\Controllers;

use App\Helpers\LogHelper;
use App\Models\Category;
use App\Models\Document;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\MailController;
use App\Models\Education;
use App\Models\EducationUser;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use DB;
use Throwable;

use function GuzzleHttp\Promise\all;

class UserController extends Controller
{
    // creating folder to store document

    protected $documents_dir = "uploads/documents";

    public function update(User $user)
    {
        $user = new User();
        $user = Auth::user();
        if (request('password')) {
            request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
                'password' => ['string', 'min:8'],
                'old_password' => ['required'],
                'phone' => ['required', 'numeric', 'min:8', Rule::unique('users')->ignore($user)],
                'profile_image' => ['mimes:jpeg,png,gif', 'max:4096', 'file'],
            ]);
        } else
            request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
                'old_password' => ['required'],
                'phone' => ['required', 'numeric', 'min:8', Rule::unique('users')->ignore($user)],
                'profile_image' => ['mimes:jpeg,png,gif', 'max:4096', 'file'],
            ]);

        if (Hash::check(request('old_password'), Auth::user()->password)) {
            if (request('password')) {
                $user->password = Hash::make(request('password'));
            }
            $user->update(
                [
                    'name' => request('name'),
                    'email' => request('email'),
                    'phone' => request('phone'),
                ]
            );

            if (request('profile_image')) {
                $tempPath = "";
                $document = new Document();
                if (!is_null(Document::where('user_id', Auth::user()->id)->get()->where('type', 'profile_picture')->first())) {
                    $document = Document::where('user_id', Auth::user()->id)->get()->where('type', 'profile_picture')->first();
                    $tempPath = Document::where('user_id', Auth::user()->id)->get()->where('type', 'profile_picture')->first()->path;
                }
                $document->path = request('profile_image')->store('profile_images');
                $document->type = 'profile_picture';
                $document->user()->associate($user->id);
                $document->save();
                if ($tempPath)
                    Storage::delete($tempPath);
            }
            return redirect('/home');
        } else {
            return Redirect::back()->withErrors(['old_password' => 'Old password did not match.'])->withInput();
        }
    }
    public function profile()
    {
        $user = User::find(Auth::user()->id);
        return view('pages.profile', compact('user'));
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('pages.profile', compact('user'));
    }
    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
     public function updateprofile1()
    {
        
        return view('pages.createProfileWizard');
    }

  

    public function getprofileImage(Request $request)
    {
        $document = Document::where('user_id', Auth::user()->id)->get();
        $category = Category::with('sub_categories')->get();
        return view('pages.createProfileWizard', compact('document', 'category'));
    }

    public function uploadfile($file, $dir)
    {
        $filename = time() . rand(1, 100) . '.' . $file->extension();
        $file->move($dir, $filename);
        return $filename;
    }
    public function addprofiledetails(Request $request)
    {
        try {
            
             $user  = new User();
            $user  = User::find(Auth::user()->id);
            $request->validate([
                'skills_category' => ['required'],
                'certificate' => ['mimes:jpeg,png,gif,pdf,docx', 'max:4096', 'file'],
                'expereince'  => ['required'],
                'educationinstutional_name' => ['required'],
                'degree'  => ['required'],
                'start_date' => ['required'],
                'end_date'   =>['required'],
                'gpa' => ['required'],
                'reference' => ['mimes:jpeg,png,gif,pdf,docx', 'max:4096', 'file'],
                'police_report' => ['nullable'],
                'personal_description' => ['required'],
                'hours' => ['required'],
                'working_days' => ['nullable'],
                'long_distance' => ['nullable'],
                'total distance' => ['nullable'],
                'street' => ['required'],
                'house_number' => ['nullable'],
                'city' => ['required'],
                'profile' => ['mimes:jpeg,png,gif,pdf,docx', 'max:4096', 'file'],

            ]);
             
            
            /* Uplaoding profile picture */
           if (request('profile')) {
                $tempPath = "";
                $document = new Document();
                if (!is_null(Document::where('user_id', Auth::user()->id)->get()->where('type', 'profile_picture')->first())) {
                    $document = Document::where('user_id', Auth::user()->id)->get()->where('type', 'profile_picture')->first();
                    $tempPath = Document::where('user_id', Auth::user()->id)->get()->where('type', 'profile_picture')->first()->path;
                }
                $document->path = request('profile')->store('profile');
                //dd(request('profile')->store('profile'));
                $document->type = 'profile_picture';
                $document->user()->associate($user->id);
                $document->save();
                if ($tempPath)
                    Storage::delete($tempPath);
            };

            //dd("hello");

          /*Uploading certificate */
          if (request('certificate'))
          {
              $tempPath1 = "";
              $document = new Document();
              if(!is_null(Document::where('user_id', Auth::user()->id)->get()->where('type', 'other')->first())){
                  $document = Document::where('user_id', Auth::user()->id)->get()->where('type', 'other')->first();
                  $tempPath1 = Document::where('user_id', Auth::user()->id)->get()->where('type', 'other')->first()->path;
              }
              $document->path = request('certificate')->store('certificate');
              //dd(request('certificate')->store('certificate'));
              $document->type = 'other';
              $document->user()->associate($user->id);
              $document->save();
              if($tempPath1)
                  Storage::delete($tempPath1);
          };

          /* uploading Referenece */
          if (request('reference')){
              $tempPath2 = "";
              $document = new Document();
              if(!is_null(Document::where('user_id', Auth::user()->id)->get()->where('type', 'reference_letter')->first())){
                  $document = Document::where('user_id', Auth::user()->id)->get()->where('type', 'reference_letter')->first();
                  $tempPath1 = Document::where('user_id', Auth::user()->id)->get()->where('type', 'reference_letter')->first()->path;
              }
              $document->path = request('reference')->store('reference');
              //dd(request('reference')->store('reference'));
              $document->type = 'reference_letter';
              $document->user()->associate($user->id);
              $document->save();
              if($tempPath2)
              Storage::delete($tempPath2);

          }
           
            $skills = new Skill();
            $skills->name = $request->skills_category;
            $skills->save();

            
            $education = new Education();
            $education->education_instution_name = $request->educationinstutional_name;
            $education->degree = $request->degree;
            $education->start_date = $request->start_date;
            $education->end_date = $request->end_date;
            $education->gpa = $request->gpa;
            $education->save();

            $education_user = new EducationUser();
            $education_user->user_id = Auth::user()->id;
            $education_user->education_id = $education->id;
            $education_user->save(); 
            

            $user->areas_covering = $skills->id;
            $user->experience = $request->expereince;
            if($request->police_report == "1")
            {
                $user->is_police_record = 1;

            }
            elseif($request->police_report == "0")
            {
                $user->is_police_record = 0;

            }

             if($request->is_travelling == "1")
            {
                $user->is_travelling = 1;

            }
            elseif($request->is_travelling == "0")
            {
                $user->is_travelling = 0;

            }
            //$user->is_police_record =  implode(',',$request->police_report);
            //$user->is_travelling =  implode(',',$request->is_travelling);
            
           
            $user->hours = $request->hours;
            //dd($request->working_days);
            //$tags = explode(" ,", $input['working_days'])
            
            $user->days = $request->input('working_days');
             $user->introduction = $request->personal_description;
            $user->street_01 = $request->street;
            $user->street_02 = $request->house_number;
            $user->city_id = 1;
            $user->save();
            Mail::send('mail.responseemail', ['name' => $user->name, 'email' => $user->email], function($m){
                 $m->to(Auth::user()->email)
          ->subject('Thnak you for submitting your details');
            });
            return redirect('/profile');
        } catch (Throwable $e) {
            
            dd($e);
            return redirect()->route('profileWizard')->withInput();
        }
    }

    public function security()
    {
        $users = User::all();
        return view('pages.security', compact('users'));
    }
}