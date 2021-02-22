<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Education;
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use DB;



use function GuzzleHttp\Promise\all;

class UserController extends Controller
{
    // creating folder to store document

    protected $documents_dir = "uploads/douments";

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
    public function updateprofile1(Request $request)
    {
        return view('pages.createProfileWizard');
    }

    public function addeducation(Request $request){

         return view('pages.addeducationbackground');

    }

    public function uploadfile($file, $dir)
    {
        $filename = time().rand(1,100).'.'.$file->extension();
        $file->move($dir, $filename);
        return $filename;
 
    }

    public function addprofiledetails(Request $request)
    {
       /* $user = new User();
        $user = Auth::user();
        try {
            $request->validate([
                'skills_category' => ['required'],
                'certificate' => ['nullable'],
                'expereince'  => ['required'],
                'educationinstutional_name' => ['required'],
                'degree'  => ['required'],
                'startdate' => ['required'],
                'enddate'   =>['required'],
                'gpa' => ['required'],
                'police_report' => ['required'],
                'personal_description' => ['required'],
                'hrs-per_weeks' => ['required'],
                'working_days' => ['required'],
                'long_distance' => ['required'],
                'total distance' => ['required'],
                'street' => ['required'],
                'house_number' => ['required'],
                'city' => ['required'],
                'profile' => ['mimes:jpeg,png,gif', 'max:4096', 'file'],
             ]);
             if(request()->hasFile('certificate')){
              $imageName = time().'.'.$request->certificate->extension();
              $document = new Document();  
              $document->path = store( $imageName);
              $document->type = 'profile_picture';
              $document->user()->associate($user->id);
              $document->save();
            
            }

            if(request()->hasFile('profile')){
              $imageName = time().'.'.$request->certificate->extension();
              $document = new Document();  
              $document->path = store( $imageName);
              $document->type = 'profile_picture';
              $document->user()->associate($user->id);
              $document->save();

            }

            $user->areas_covering = $request->skills_category;
            $user ->experience =  $request->experience;
            $user->is_police_record = $request->police_report;
            $user->is_travelling = $request-> long_distance;
            $user->days = $request->working_days;
            $user->introduction = $request-> personal_description;
            $user->street_01 = $request-> street;
            $user->city_id= $request -> city;
            $user-save();
            return redirect('/profile');
           
        } catch (Throwable $e) {
           LogHelper::store('User', $e);
           return redirect()->route('profile')->withInput();
        }
           }*/


           try {
               $user  = new User();
               $user  = Auth::user();
                $request->validate([
               'skills_category' => ['required'],
                'certificate' => ['nullable'],
                'expereince'  => ['required'],
                'educationinstutional_name' => ['required'],
                'degree'  => ['required'],
                'startdate' => ['required'],
                'enddate'   =>['required'],
                'gpa' => ['required'],
                'police_report' => ['required'],
                'personal_description' => ['required'],
                'hrs_per_weeks' => ['required'],
                'working_days' => ['required'],
                'long_distance' => ['required'],
                'total distance' => ['required'],
                'street' => ['required'],
                'house_number' => ['nullable'],
                'city' => ['required'],
                'profile' => ['mimes:jpeg,png,gif', 'max:4096', 'file'],

                ]);

                $education = new Education();
                $education->education_instution_name = $request->educationinstutional_name;
                $education->degree = $request -> degree;
                $education->start_date = $request -> start_date;
                $education->end_date= $request -> end_date;
                $education->gpa = $request->gpa;
                $education->user()->associate($user->id);
                $education->save();

                $skills = new Skill();
                $skills->name = $request->skills_category;
                $skills->save();

                $user->areas_covering = $skill->id;
                $user->expereince = $request->expereince;
                $user->is_police_record = $request->police_report;
                $user->is_travelling = $request->long_distance;
                $user->hours = $request->hrs_per_weeks;
                $user->days = $request->working_days;
                $user->street_01 = $request->street;
                $user->street_02 = $request->house_number;
                $user->city_id = $request->city;
                $user->save();
                return redirect('/profile');



           } catch (\Throwable $th) {
               //throw $th;
           }
    
    }
}
            

          
             
            
           
                

           
       
       
        
       


        

           
     

     


   

   
       

        
    
