<?php

namespace App\Http\Controllers;

use App\Helpers\LogHelper;
use App\Helpers\ToastHelper;
use App\Models\Category;
use App\Models\City;
use App\Models\Document;
use App\Models\Education;
use App\Models\EducationUser;
use App\Models\Email;
use App\Models\SubCategory;
use App\Models\References;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\MailController;
use App\Models\Parish;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;
use Throwable;
use Illuminate\Support\Str;
use Response;
use File;

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
        
        $user = User::with('emails', 'phones')->find(Auth::user()->id);
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
        $page_title = 'Profile Wizard';
        $page_description = 'This is profile wizard page';
        $document = Document::where('user_id', auth()->id())->get();
        $category = Category::with('sub_categories')->get();
        $city = City::all();
        $users = User::with('references')->get();
        $parishes = Parish::all();
        auth()->user()->allCategories();
        return view('pages.createProfileWizard', compact('page_title','page_description','document', 'category', 'parishes', 'city', 'users'));
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
             $email = auth()->user()->getEmail(Auth::user()->id);
            
            $Subb = "[".$request->totalCatList."]";
            $Subb = str_replace('},]','}]',$Subb);
            $user_subcategories = new Collection();
            $new = collect();
            foreach(json_decode($Subb) as $subCattArray) {
                $subCatt = 'sub_categories'. $subCattArray->fieldId;
                $categoryy = 'skills_category'. $subCattArray->fieldId;
                foreach(json_decode($request->$subCatt) as $subCat){
                    
                    if(empty($subCat->id)){
                    $cat = Category::find($request->$categoryy)->sub_categories()->create([
                        'name' => $subCat->value,
                        'description' => 'Proposed Category'
                    ]);
                    $cat->status = "proposed";
                    $cat->save();
                    $user_subcategories->push(SubCategory::find($cat->id));
                }
                else
                    $user_subcategories->push(SubCategory::find($subCat->id));
            }
         }
       
  
        /* Storing Profile Picture */
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

           

            /* Storing certificate*/
            $Certificate = "[".$request->totalCertificateList."]";
            $Certificate1 = str_replace('},]','}]',$Certificate);
            $skills_certificate = new Collection();
            $skills_experince = new Collection();
            foreach(json_decode($Certificate1) as $certificateArray){
                $document = new Document();
                $tempPath = "";
                $id = $certificateArray->fieldId;
                $experience = 'experience'.$id;
                if (!is_null(Document::where('user_id', Auth::user()->id)->get()->where('type', 'certificate'.$id)->first())) {
                    $document = Document::where('user_id', Auth::user()->id)->get()->where('type', 'certificate'.$id)->first();
                    $tempPath = Document::where('user_id', Auth::user()->id)->get()->where('type', 'certificate'.$id)->first()->path;
                }
                $certificate_new = 'certificate'.$id;
                $document->path = request($certificate_new)->store('certificates');
                $document->type = 'certificate'.$id;
                $document->experience = $request->$experience;
                $document->user()->associate($user->id);
                $document->save();
                if ($tempPath)
                    Storage::delete($tempPath);
            }

            /*  storing Reference */
            $Refernces = "[".$request->totalRefList."]";
            $Refernces1 = str_replace('},]','}]',$Refernces);
            $user_references= new Collection();
            foreach(json_decode($Refernces1) as $referencesArray){
                
               
                $references = new References();
                $id = $referencesArray->fieldId;
                
                $references_name = 'referal_name'.$id;
                $references_email = 'referal_email'.$id;
                $references_phone = 'referal_phone'.$id;
                $references->refname = request($references_name);
                $references->refemail = request($references_email);
                $references->refphone = request($references_phone);
                $references->user()->associate($user->id);
                $references->save();
                
            }
            /*inserting Education qualification */
            $education = [
            'education_institution_name' => $request->educationinstutional_name,
            'degree' => $request->degree,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            ];
            $user->educations()->create($education);
             

            /* Storing radio button value */
            if ($request->police_report == "1") {
                $user->is_police_record = 1;
            } elseif ($request->police_report == "0") {
                $user->is_police_record = 0;
            }
             if($request->is_travelling == "1")
            {
                $user->is_travelling = 1;
            } elseif ($request->is_travelling == "0") {
                $user->is_travelling = 0;
            }

          
            /* Converting skills array */
            $skillArray = array();
            foreach (json_decode($request->sub_categories) as $category) {
                array_push($skillArray, $category->value);
            }
            /* converting  days array */
           $dayArray = array();
           foreach (json_decode($request->working_days) as $days) {
            array_push($dayArray, $days->value);
        }
          $user->hours = $request->hours;
          $user->days = implode(',',$dayArray) ;
          $user->introduction = $request->personal_description;
          $user->street_01 = $request->street;
          $user->street_02 = $request->house_number;
          $user->city_id = $request->cities;
          $user->total_distance = $request->total_distance;
          $user->subcategories()->attach($user_subcategories);
          $user->status = "pending";
          $user->save();
          
          Mail::send('mail.createProfile', compact('request', 'user_subcategories'), function($message) use ($request, $email)
            {
                $message->to($email, $request->name)->subject('Profile Created');
            });
            return redirect('/profile');
        } catch (Throwable $e) {
            LogHelper::storeMessage("Profile Wizard",$e->getMessage(),$user);
            return redirect()->route('profileWizard')->withInput();
        }
    }

    //Added by Ashish Pokhrel*/
    //Update User Application

    public function updateprofiledetails()
    {
        try {
            $user = new User;
            $user  = User::find(Auth::user()->id);
             /* Updating Profile Picture */
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

           

            /* Updating certificate*/
            $Certificate = "[".$request->totalCertificateList."]";
            $Certificate1 = str_replace('},]','}]',$Certificate);
            $skills_certificate = new Collection();
            $skills_experince = new Collection();
            foreach(json_decode($Certificate1) as $certificateArray){
                $document = new Document();
                $tempPath = "";
                $id = $certificateArray->fieldId;
                $experience = 'experience'.$id;
                if (!is_null(Document::where('user_id', Auth::user()->id)->get()->where('type', 'certificate'.$id)->first())) {
                    $document = Document::where('user_id', Auth::user()->id)->get()->where('type', 'certificate'.$id)->first();
                    $tempPath = Document::where('user_id', Auth::user()->id)->get()->where('type', 'certificate'.$id)->first()->path;
                }
                $certificate_new = 'certificate'.$id;
                $document->path = request($certificate_new)->store('certificates');
                $document->type = 'certificate'.$id;
                $document->experience = $request->$experience;
                $document->user()->associate($user->id);
                $document->save();
                if ($tempPath)
                    Storage::delete($tempPath);
            }

            /*  updating  Reference */
            $Refernces = "[".$request->totalRefList."]";
            $Refernces1 = str_replace('},]','}]',$Refernces);
            $user_references= new Collection();
            foreach(json_decode($Refernces1) as $referencesArray){
                
               
                $references = new References();
                $id = $referencesArray->fieldId;
                
                $references_name = 'referal_name'.$id;
                $references_email = 'referal_email'.$id;
                $references_phone = 'referal_phone'.$id;
                $references->refname = request($references_name);
                $references->refemail = request($references_email);
                $references->refphone = request($references_phone);
                $references->user()->associate($user->id);
                $references->save();
                
            }
            /*updating  Education qualification */
            $education = [
            'education_institution_name' => $request->educationinstutional_name,
            'degree' => $request->degree,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            ];
            $user->educations()->create($education);
             

            /* updating  radio button value */
            if ($request->police_report == "1") {
                $user->is_police_record = 1;
            } elseif ($request->police_report == "0") {
                $user->is_police_record = 0;
            }
             if($request->is_travelling == "1")
            {
                $user->is_travelling = 1;
            } elseif ($request->is_travelling == "0") {
                $user->is_travelling = 0;
            }

          
            /* Converting skills array */
            $skillArray = array();
            foreach (json_decode($request->sub_categories) as $category) {
                array_push($skillArray, $category->value);
            }
            /* converting  days array */
           $dayArray = array();
           foreach (json_decode($request->working_days) as $days) {
            array_push($dayArray, $days->value);
        }
          
          $user->hours = $request->hours;
          $user->days = implode(',',$dayArray) ;
          $user->introduction = $request->personal_description;
          $user->street_01 = $request->street;
          $user->street_02 = $request->house_number;
          $user->city_id = $request->cities;
          $user->total_distance = $request->total_distance;
          $user->subcategories()->attach($user_subcategories);
          $user->status = "pending";
          $user->save();
          
          Mail::send('mail.createProfile', compact('request', 'user_subcategories'), function($message) use ($request, $email)
            {
                $message->to($email, $request->name)->subject('Profile Updated');
            });
            return redirect('/profile');
        } catch (\Throwable $e) {
            LogHelper::storeMessage("Profile Wizard",$e->getMessage(),$user);
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
        $email = $user->getEmail($request->user);
        Mail::send('mail.changeStatus', ['user'=>$user,'status' => $request->status], function ($m) use ($email) {
            $m->to($email)->subject('User Status Changed');
        });
        if($user->id == auth()->id() && ($request->status == 'deactivated' || $request->status == 'deleted')) {
            auth()->logout();
        }
        return redirect()->back();
    }
    public function makePrimary($email)
    {
        $emails = auth()->user()->emails();
        foreach($emails->get() as $e) {
            $e->primary = FALSE;
            $e->save();
        }
        $em = Email::where('email',$email)->first();
        $em->primary = TRUE;
        $em->save();
        ToastHelper::showToast('Email '.$email.' set as primary email.');
        return redirect()->route('accountSecurity');
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
        $user = User::find(auth()->id());
        $parishes = Parish::all();
        return view('pages.editProfile', compact('user', 'parishes'));
    }

    public function putEditProfile(Request $request)
    {
        $user = User::find(auth()->id());
        try {
            $user->gender = $request->gender;
            $user->city_id = $request->city;
            $user->street_01 = $request->street_01;
            $user->street_02 = $request->street_02;
            $user->companyname = $request->companyname;
            $user->experience = $request->experience;
            $user->website = $request->website;
            $user->is_travelling = $request->is_travelling;
            $user->is_police_record = $request->is_police_record;
            $user->introduction = $request->introduction;
            $user->hours = $request->hours;
            $user->days = $request->days;
            $user->areas_covering = $request->areas_covering;
            if (request()->hasFile('profile_image')) {
                $tempPath = "";
                $document = new Document();
                if (!is_null(Document::where('user_id', Auth::user()->id)->get()->where('type', 'profile_picture')->first())) {
                    $document = Document::where('user_id', Auth::user()->id)->get()->where('type', 'profile_picture')->first();
                    $tempPath = Document::where('user_id', Auth::user()->id)->get()->where('type', 'profile_picture')->first()->path;
                }
                $document->path = request('profile_image')->store('userprofile');
                $document->type = 'profile_picture';
                $document->user()->associate($user->id);
                $document->save();
                if ($tempPath)
                    Storage::delete($tempPath);
            }
            else {
                ToastHelper::showToast('Error with profile picture.','error');
            }
            $user->save();
            ToastHelper::showToast('Profile has been updated');
            return redirect()->route('viewProfile');
        } catch (Throwable $e) {
            ToastHelper::showToast('Profile cannot be updated.', 'error');
            LogHelper::store('User', $e);
        }
    }

    public function putEditSocial(Request $request)
    {
        $user = User::find(auth()->id());
        try {
            $user->facebook = $request->facebook;
            $user->twitter = $request->twitter;
            $user->instagram = $request->instagram;
            $user->save();
            ToastHelper::showToast('Social Links has been updated');
            return redirect()->route('viewProfile');
        } catch (Throwable $e) {
            ToastHelper::showToast('Social Links be updated.', 'error');
            LogHelper::store('UserSocial', $e);
        }
    }
    public function editUserProfile($id)
    {
        if (User::find($id) == Auth::user()) {
            return redirect()->route('editProfile');
        }
        $user = User::find($id);
        $parishes = City::all();
        return view('pages.editProfile', compact('user', 'parishes'));
    }

    public function putEditUserProfile(Request $request, $id)
    {
        $user = User::find($id);
        try {
            $request->validate([
                'gender' => 'required',
                'city_id' => 'required',
                'street_01' => 'required',
                'street_02' => '',
                'companyname' => '',
                'experience' => '',
                'website' => '',
                'is_travelling' => 'required',
                'is_police_record' => 'required'
            ]);
            $user->gender = $request->gender;
            $user->city_id = $request->city_id;
            $user->street_01 = $request->street_01;
            $user->street_02 = $request->street_02;
            $user->companyname = $request->companyname;
            $user->experience = $request->experience;
            $user->website = $request->website;
            $user->is_travelling = $request->is_travelling;
            $user->is_police_record = $request->is_police_record;
            $user->save();
            ToastHelper::showToast('Profile has been updated');
        } catch (Throwable $e) {
            ToastHelper::showToast('Profile cannot be updated.', 'error');
            LogHelper::store('User', $e);
        }
        return redirect()->route('viewProfile');
    }
    public function emptyPage()
    {
        return view('pages.emptyFile');
    }
    public function adminAddUser()
    {
        return view('admin.profile.adminAddUser');
    }
    public function adminAddUserSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'email' => 'required|unique:emails,email',
            'phone' => 'required|unique:phones,phone',
            'gender' => 'required',
            'type' => 'required',
            'city_id' => 'required',
            'street_01' => 'required'
        ],[
            'unique'    =>  'This :attribute already exists. Please try another one.'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput(request()->all())->withErrors($validator);
        }
        $data = request()->except('email','phone');
        $new = [
            'email_verified_at' => now(),
            'status' => $request->type == 'independent_contractor' ? 'new' : 'active'
        ];
        $user = User::create(array_merge($data,$new));
        $user->emails()->create([
            'email' => $request->email,
            'primary' => true,
            'verified' => false
        ]);
        $user->phones()->create([
            'phone' => $request->phone,
            'primary' => true,
        ]);
        $token = Str::random(32);

        DB::table('password_resets')->insert(
            ['email' => $request->email, 'token' => $token, 'created_at' => now()]
        );

        Mail::send('mail.adminAddUser', compact('token','user'), function ($message) use ($request) {
            $message->to($request->email,$request->name);
            $message->subject('Account Created - FixitJA');
        });
        ToastHelper::showToast('User Account Created.');
        return redirect()->route('viewUser',$user->id);
    }

    public function profileDocuments()
    {
        $user = auth()->user();
        return view('admin.profile.documents', compact('user'));
    }
    public function userDocuments($id)
    {
        if (User::find($id) == auth()->user()) {
            return redirect()->route('viewDocuments');
        }
        $user = User::find($id);
        return view('admin.profile.documents', compact('user'));
    }

    public function profileEducations()
    {
        $user = auth()->user();
        return view('admin.profile.education', compact('user'));
    }
    public function userEducations($id)
    {
        if (User::find($id) == auth()->user()) {
            return redirect()->route('viewEducations');
        }
        $user = User::find($id);
        return view('admin.profile.education', compact('user'));
    }
    public function profileReferences()
    {
        $user = auth()->user();
        return view('admin.profile.reference', compact('user'));
    }
    public function userReferences($id)
    {
        if (User::find($id) == auth()->user()) {
            return redirect()->route('viewReferences');
        }
        $user = User::find($id);
        return view('admin.profile.reference', compact('user'));
    }
    public function createProfilewithSub($subCatId)
    {

        
        if(!empty($subCatId))
            session()->flash('subCatId',$subCatId);
        return redirect()->route('ProfileWizard');
    }
    public function downloadcertificate($filename)
    {
       $file = 'certificates/'.$filename;
       return Storage::download($file);
        
    	
        
    }
    
}
