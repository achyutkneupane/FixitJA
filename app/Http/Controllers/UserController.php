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
        $document = Document::where('user_id', auth()->id())->get();
        $category = Category::with('sub_categories')->get();
        return view('pages.createProfileWizard', compact('document', 'category'));
    }
    
    public function updateprofilewithSub($subCatId = NULL)
   {
    $document = Document::where('user_id', Auth::user()->id)->get();
    $category = Category::with('sub_categories')->get();
    $subs = SubCategory::all();
       if($subCatId != NULL)
           session()->flash('subCatId',$subCatId);
       return view('pages.createProfileWizard', compact('document', 'category','subs'));
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
                'end_date'   => ['required'],
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
                $document->path = request('profile')->store('userprofile');
                $document->type = 'profile_picture';
                $document->user()->associate($user->id);
                $document->save();
                if ($tempPath)
                    Storage::delete($tempPath);
            };

            //dd("hello");

            /*Uploading certificate */
            if (request('certificate')) {
                $tempPath1 = "";
                $document = new Document();
                if (!is_null(Document::where('user_id', Auth::user()->id)->get()->where('type', 'other')->first())) {
                    $document = Document::where('user_id', Auth::user()->id)->get()->where('type', 'other')->first();
                    $tempPath1 = Document::where('user_id', Auth::user()->id)->get()->where('type', 'other')->first()->path;
                }
                $document->path = request('certificate')->store('certificate');
                //dd(request('certificate')->store('certificate'));
                $document->type = 'other';
                $document->user()->associate($user->id);
                $document->save();
                if ($tempPath1)
                    Storage::delete($tempPath1);
            };

            /* uploading Referenece */
            if (request('reference')) {
                $tempPath2 = "";
                $document = new Document();
                if (!is_null(Document::where('user_id', Auth::user()->id)->get()->where('type', 'reference_letter')->first())) {
                    $document = Document::where('user_id', Auth::user()->id)->get()->where('type', 'reference_letter')->first();
                    $tempPath1 = Document::where('user_id', Auth::user()->id)->get()->where('type', 'reference_letter')->first()->path;
                }
                $document->path = request('reference')->store('reference');
                //dd(request('reference')->store('reference'));
                $document->type = 'reference_letter';
                $document->user()->associate($user->id);
                $document->save();
                if ($tempPath2)
                    Storage::delete($tempPath2);
            }




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


            //$user->areas_covering = $skills->id;
            $user->experience = $request->expereince;

            // logic for the radio button
            if ($request->police_report == "1") {
                $user->is_police_record = 1;
            } elseif ($request->police_report == "0") {
                $user->is_police_record = 0;
            }

            if ($request->is_travelling == "1") {
                $user->is_travelling = 1;
            } elseif ($request->is_travelling == "0") {
                $user->is_travelling = 0;
            }


            /* Converting skills array */
            $skillArray = array();
            foreach (json_decode($request->sub_categories) as $category) {
                array_push($skillArray, $category->value);
            }


            //dd($request->sub_categories);



            $subcategory = new SubCategory();
            dd($skillArray);
            $skill = implode(',', $skillArray);
            $subcategory->name = $skill;

            $subcategory->description = "working";
            $subcategory->category_id = $request->skills_category;
            $subcategory->save();

            /* converting  days array */
            $dayArray = array();
            foreach (json_decode($request->working_days) as $days) {
                array_push($dayArray, $days->value);
            }
            //dd(implode(',',$dayArray));

            $user->hours = $request->hours;

            $user->days = implode(',', $dayArray);



            $user->introduction = $request->personal_description;
            $user->street_01 = $request->street;
            $user->street_02 = $request->house_number;
            $user->city_id = 1;
            $user->save();
            Mail::send('mail.responseemail', ['name' => $user->name, 'email' => $user->email], function ($m) {
                $m->to(auth()->user()->email())->subject('Thank you for submitting your details');
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
        Mail::send('mail.changeStatus', ['user'=>$user,'status' => $request->status], function ($m) use ($user) {
            $m->to($user->email())->subject('User Status Changed');
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
        $cities = City::all();
        return view('pages.editProfile', compact('user', 'cities'));
    }

    public function putEditProfile(Request $request)
    {
        $user = User::find(auth()->id());
        try {
            $request->validate([
                'gender' => 'required',
                'city_id' => 'required',
                'street_01' => 'required',
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
            $user->introduction = $request->introduction;
            $user->hours = $request->hours;
            $user->days = $request->days;
            $user->areas_covering = $request->areas_covering;
            if (request('profile_image')) {
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
                return redirect()->back();
            }
            $user->save();
            ToastHelper::showToast('Profile has been updated');
            return redirect()->route('viewProfile');
        } catch (Throwable $e) {
            dd($e);
            ToastHelper::showToast('Profile cannot be updated.', 'error');
            LogHelper::store('User', $e);
        }
    }

    public function editUserProfile($id)
    {
        if (User::find($id) == Auth::user()) {
            return redirect()->route('editProfile');
        }
        $user = User::find($id);
        $cities = City::all();
        return view('pages.editProfile', compact('user', 'cities'));
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
            dd($e);
            ToastHelper::showToast('Profile cannot be updated.', 'error');
            LogHelper::store('User', $e);
        }
        return redirect()->route('viewProfile');
    }
    public function emptyPage()
    {
        return view('pages.emptyFile');
    }
}
