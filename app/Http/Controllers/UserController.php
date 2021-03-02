<?php

namespace App\Http\Controllers;

use App\Helpers\LogHelper;
use App\Helpers\ToastHelper;
use App\Models\Category;
use App\Models\City;
use App\Models\Document;
use App\Models\Education;
use App\Models\EducationUser;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Throwable;

use function GuzzleHttp\Promise\all;

class UserController extends Controller
{
    public function update(User $user)
    {
        $user = new User();
        $user = User::find(auth()->id());
        if (request('password')) {
            request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('emails')],
                'password' => ['string', 'min:8'],
                'old_password' => ['required'],
                'phone' => ['required', 'numeric', 'min:8', Rule::unique('phones')],
                'profile_image' => ['mimes:jpeg,png,gif,jpg', 'max:4096', 'file'],
            ]);
        } else
            request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('emails')],
                'old_password' => ['required'],
                'phone' => ['required', 'numeric', 'min:8', Rule::unique('phones')],
                'profile_image' => ['mimes:jpeg,png,gif,jpg', 'max:4096', 'file'],
            ]);

        if (Hash::check(request('old_password'), Auth::user()->password)) {
            if (request('password')) {
                $user->password = Hash::make(request('password'));
            }
            $user->update(
                [
                    'name' => request('name'),
                ]
            );
            $user->emails()->update([
                'email' => request('email'),
                'primary' => true
            ]);
            $user->phones()->update([
                'email' => request('phone'),
                'primary' => true
            ]);

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
        $user = User::with('emails', 'phones')->find(Auth::user()->id)->first();

        return view('pages.profile', compact('user'));
    }
    public function show($id)
    {
        if (User::find($id) == Auth::user()) {
            return redirect()->route('viewProfile');
        }
        $user = User::with('emails', 'phones')->find($id);
        return view('pages.profile', compact('user'));
    }
    public function index()
    {
        $users = User::with('emails', 'phones')->get();
        return view('admin.profile.users', compact('users'));
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
                'sub_categories' => ['required'],
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

            //dd(implode(',',$request->working_days));
             
            
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
            

            //$user->areas_covering = $skills->id;
            $user->experience = $request->expereince;

            // logic for the radio button 
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

            /* Converting skills array */

            $subcategory = new SubCategory();
            //dd($request->sub_categories);
 $dayArray = array();
           foreach (json_decode($request->sub_categories) as $days) {
            array_push($dayArray, $days->value);
        }
        dd($dayArray);
        $subcategory->name = $skillsArray ;
        $subcategory->description ="working";
        $subcategory->category_id = $skills_category;
        $subcategory->save();
            
            /* converting  days array */
           $dayArray = array();
           foreach (json_decode($request->working_days) as $days) {
            array_push($dayArray, $days->value);
        }
            //dd(implode(',',$dayArray));
           
            $user->hours = $request->hours;

            $user->days = implode(',',$dayArray) ;

           
            
             $user->introduction = $request->personal_description;
            $user->street_01 = $request->street;
            $user->street_02 = $request->house_number;
            $user->city_id = 1;
            $user->save();
            Mail::send('mail.responseemail', ['name' => $user->name, 'email' => $user->email], function($m){
                 $m->to(Auth::user()->email)
          ->subject('Thank you for submitting your details');
            });
            return redirect('/profile');
        } catch (Throwable $e) {
            
            dd($e);
            return redirect()->route('profileWizard')->withInput();
        }
    }

    public function security()
    {
        $user = User::with('emails', 'phones')->find(Auth::user()->id);
        return view('admin.profile.security', compact('user'));
    }
    public function viewSecurity($id)
    {
        if (User::find($id) == Auth::user()) {
            return redirect()->route('accountSecurity');
        }
        $user = User::with('emails', 'phones')->find($id);
        return view('admin.profile.security', compact('user'));
    }
    public function changePassword(Request $request)
    {
        $user = User::find(auth()->id());
        if (!Hash::check($request->old_password, $user->password)) {
            ToastHelper::showToast("Old Password doesn't match.", "error");
            return redirect()->route('accountSecurity')->withInput($request->input());
        } else {
            $user->password = Hash::make($request->new_password);
            $user->save();
            ToastHelper::showToast("Password has been changed.");
            return redirect()->route('accountSecurity');
        }
    }
    public function addEmail(Request $request)
    {
        $user = User::with('emails')->find($request->user);
        try {
            $email = $request->validate([
                'email' => ['required', 'string', 'email', 'unique:emails,email', 'max:255'],
            ]);
            $user->emails()->create($email);
            return redirect()->back();
        } catch (Throwable $e) {
            dd($e);
            LogHelper::store('Category', $e);
            return redirect()->back();
        }
    }
    public function deactivateUser()
    {
        $user = User::find(auth()->id());
        $user->status = "deactivated";
        $user->save();
        ToastHelper::showToast('Account successfully deactivated.');
        return redirect()->route('logout');
    }
    public function deleteUser()
    {
        $user = User::find(auth()->id());
        $user->status = "deleted";
        $user->save();
        ToastHelper::showToast('Account successfully deleted.');
        return redirect()->route('logout');
    }

    public function changeStatus(Request $request)
    {
        $user = User::find($request->user);
        $user->status = $request->status;
        $user->save();
        ToastHelper::showToast('User Status Changed.');
        return redirect()->back();
    }

    public function profileSkills()
    {
        $user = auth()->user();
        $subCats = $user->allCategories();
        return view('admin.profile.skills', compact('user', 'subCats'));
    }
    public function userSkills($id)
    {
        if (User::find($id) == Auth::user()) {
            return redirect()->route('profileSkills');
        }
        $user = User::find($id);
        $subCats = $user->allCategories();
        return view('admin.profile.skills', compact('user', 'subCats'));
    }
    public function editProfile()
    {
        $user = User::with('emails', 'phones')->find(auth()->id());
        $cities = City::all();
        return view('pages.editProfile', compact('user', 'cities'));
    }
}
