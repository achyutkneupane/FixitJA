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
use Illuminate\Support\Facades\Mail;
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
            //dd($request->all());
           
          

           
          
              
           
           
           
        
       
         if (request('profile')) {
                $tempPath = "";
                $document = new Document();
                if (!is_null(Document::where('user_id', Auth::user()->id)->get()->where('type', 'profile_picture')->first())) {
                    $document = Document::where('user_id', Auth::user()->id)->get()->where('type', 'profile_picture')->first();
                    $tempPath = Document::where('user_id', Auth::user()->id)->get()->where('type', 'profile_picture')->first()->path;
                }
                $document->path = request('profile')->store('userprofile');
                $document->type = 'profile_picture';
                $document->user()->associate($user->id);
                $document->save();
                if ($tempPath)
                    Storage::delete($tempPath);
            };


            /* for certificate*/

            $Certificate = "[".$request->totalCertificateList."]";
           
            $Certificate1 = str_replace('},]','}]',$Certificate);
            
            $skills_certificate = new Collection();
            $skills_experince = new Collection();
            $new_certificate = collect();
            $new_reference = collect();
            foreach(json_decode($Certificate1) as $certificateArray){
                $certificate_new = 'certificate'. $certificateArray->fieldId;
                $experience_new = 'experience'. $certificateArray->fieldId;
                foreach(json_decode($request->certificate_new) as $subCertificate){
                    if(!empty($subCertificate)){

                        $skills_certificate->push($subCertificate);
                    
                    }
                                    
                }
                    
                    

                
                
            }
            dd($skills_certificate);

            /* refernce */
            
            foreach(json_decode($Certificate) as $certificateArray){
                $new_certificate = 'certificate'. $certificateArray->fieldId;
                $new_experience = 'experience'. $certificateArray->fieldId;
                if($new_experience){
                    foreach(json_decode($request->new_experience) as $subRefernces){
                        if(!empty($subRefernces)){

                            $skills_experince->push($subRefernces);
                            
                           
                        
                    }
                                    
                }
                    
                    

                }
                
            }

            $document = new Document();
            $document->path()->attach($skills_certificate)->store('other');
            $document->type = 'other';
            $document->user()->associate($user->id);
            $document->save();

                    
                
               
               
                
               
                
                    
                
                   
                
                
           
            
            
            
            
            
           

             /*if (request('certificate0')) {
                
                
                $tempPath0 = "";
                $document = new Document();
                if (!is_null(Document::where('user_id', Auth::user()->id)->get()->where('type', 'other')->first())) {
                    $document = Document::where('user_id', Auth::user()->id)->get()->where('type', 'other')->first();
                    $tempPath = Document::where('user_id', Auth::user()->id)->get()->where('type', 'other')->first()->path;
                }
                $document->path = request('certificate0')->store('certificate');
                $document->type = 'other';
                $document->user()->associate($user->id);
                $document->save();
                if ($tempPath0)
                    Storage::delete($tempPath0);
              
            
            }
            if (request('certificate1')) {
                
                
                $tempPath1 = "";
                $document = new Document();
                if (!is_null(Document::where('user_id', Auth::user()->id)->get()->where('type', 'other')->first())) {
                    $document = Document::where('user_id', Auth::user()->id)->get()->where('type', 'other')->first();
                    $tempPath = Document::where('user_id', Auth::user()->id)->get()->where('type', 'other')->first()->path;
                }
                $document->path = request('certificate1')->store('certificate');
                $document->type = 'other';
                $document->user()->associate($user->id);
                $document->save();
                if ($tempPath1)
                    Storage::delete($tempPath1);
              
            
            }
            if (request('certificate2')) {
                
                
                $tempPath2 = "";
                $document = new Document();
                if (!is_null(Document::where('user_id', Auth::user()->id)->get()->where('type', 'other')->first())) {
                    $document = Document::where('user_id', Auth::user()->id)->get()->where('type', 'other')->first();
                    $tempPath = Document::where('user_id', Auth::user()->id)->get()->where('type', 'other')->first()->path;
                }
                $document->path = request('certificate2')->store('certificate');
                $document->type = 'other';
                $document->user()->associate($user->id);
                $document->save();
                if ($tempPath2)
                    Storage::delete($tempPath2);
              
            
            }

            if($request->experience0){
                 $user->experience = $request->experience0;
            }
            if($request->experience1){
                 $user->experience = $request->experience1;
            }
            if($request->experience2){
                 $user->experience = $request->experience2;
            }*/
           
            
           $education = new Education();
            $education->education_instution_name = $request->educationinstutional_name;
            $education->degree = $request->degree;
            $education->start_date = $request->start_date;
            $education->end_date = $request->end_date;
            $education->save();

            $education_user = new EducationUser();
            $education_user->user_id = Auth::user()->id;
            $education_user->education_id = $education->id;
            $education_user->save();
          
         // logic for the radio button */
            if($request->police_report == "1") {
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
        


         
            /* converting  days array */
           $dayArray = array();
           foreach (json_decode($request->working_days) as $days) {
            array_push($dayArray, $days->value);
        }
          $user->hours = $request->hours;
          $user->days = implode(',',$dayArray) ;
          $user->introduction = $request->personal_description;
          //$user->areas_covering()->attach($user_subcategories);
          $user->experience()->attach($skills_experince);
         
          $user->street_01 = $request->street;
          $user->street_02 = $request->house_number;
          $user->city_id = 1;
          $user->status = "pending";
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


          
         

     

                    
                   
               
        
        

           
            

          
          



            
              

           
               
            
            
           

            
            
           

            


           
            
           
           

            
           
            

          

           

           
           
           
           
           
            

   