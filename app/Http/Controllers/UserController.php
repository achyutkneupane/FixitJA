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
use App\Mail\AdminAddUser;
use App\Mail\ChangeStatus;
use App\Mail\CreateProfile;
use App\Mail\ReferralEmail;
use App\Models\Parish;
use App\Models\Refer;
use App\Models\Review;
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
        if (request('password'))
        {
            request()
                ->validate(['name' => ['required', 'string', 'max:255'], 'email' => ['required', 'string', 'email', 'max:255', Rule::unique('emails') ], 'password' => ['string', 'min:8'], 'old_password' => ['required'], 'phone' => ['required', 'numeric', 'min:8', Rule::unique('phones') ], 'profile_image' => ['mimes:jpeg,png,gif,jpg', 'max:4096', 'file'], ]);
        }
        else request()
            ->validate(['name' => ['required', 'string', 'max:255'], 'email' => ['required', 'string', 'email', 'max:255', Rule::unique('emails') ], 'old_password' => ['required'], 'phone' => ['required', 'numeric', 'min:8', Rule::unique('phones') ], 'profile_image' => ['mimes:jpeg,png,gif,jpg', 'max:4096', 'file'], ]);

        if (Hash::check(request('old_password') , Auth::user()
            ->password))
        {
            if (request('password'))
            {
                $user->password = Hash::make(request('password'));
            }
            $user->update(['name' => request('name') , ]);
            $user->emails()
                ->update(['email' => request('email') , 'primary' => true]);
            $user->phones()
                ->update(['email' => request('phone') , 'primary' => true]);

            if (request('profile_image'))
            {
                $tempPath = "";
                $document = new Document();
                if (!is_null(Document::where('user_id', Auth::user()->id)
                    ->get()
                    ->where('type', 'profile_picture')
                    ->first()))
                {
                    $document = Document::where('user_id', Auth::user()->id)
                        ->get()
                        ->where('type', 'profile_picture')
                        ->first();
                    $tempPath = Document::where('user_id', Auth::user()->id)
                        ->get()
                        ->where('type', 'profile_picture')
                        ->first()->path;
                }
                $document->path = request('profile_image')
                    ->store('profile_images');
                $document->type = 'profile_picture';
                $document->user()
                    ->associate($user->id);
                $document->save();
                if ($tempPath) Storage::delete($tempPath);
            }
            return redirect('/home');
        }
        else
        {
            return Redirect::back()->withErrors(['old_password' => 'Old password did not match.'])
                ->withInput();
        }
    }
    public function profile()
    {

        $user = auth()->user();
        return view('pages.profile', compact('user'));
    }
    public function show($id)
    {
        if ($id == auth()->id())
        {
            return redirect()->route('viewProfile');
        }
        $user = User::with('emails', 'phones')->find($id);
        return view('pages.profile', compact('user'));
    }
    public function index()
    {
        $users = User::with('emails', 'phones', 'city', 'documents')->get();
        return view('admin.profile.users', compact('users'));
    }
    public function updateprofile1()
    {
        $page_title = 'Profile Wizard';
        $page_description = 'This is profile wizard page';
        $document = Document::where('user_id', auth()->id())
            ->get();
        $category = Category::with('sub_categories')->get();
        $city = City::all();
        $users = User::with('references')->get();
        $parishes = Parish::all();
        auth()->user()->allCategories();
        return view('pages.createProfileWizard', compact('page_title', 'page_description', 'document', 'category', 'parishes', 'city', 'users'));
    }

    public function uploadfile($file, $dir)
    {
        $filename = time() . rand(1, 100) . '.' . $file->extension();
        $file->move($dir, $filename);
        return $filename;
    }

    public function addprofiledetails(Request $request)
    {
        /* For new Skilled worker  to fillup application*/
        if (auth()->user()->status == 'new')
        {
            try
            {
                $user = new User();
                $user = User::find(Auth::user()->id);
                $email = auth()->user()
                    ->getEmail(Auth::user()
                    ->id);

                $Subb = "[" . $request->totalCatList . "]";
                $Subb = str_replace('},]', '}]', $Subb);
                $user_subcategories = new Collection();
                $new = collect();
                foreach (json_decode($Subb) as $subCattArray)
                {
                    $subCatt = 'sub_categories' . $subCattArray->fieldId;
                    $categoryy = 'skills_category' . $subCattArray->fieldId;
                    foreach (json_decode($request->$subCatt) as $subCat)
                    {

                        if (empty($subCat->id))
                        {
                            $cat = Category::find($request->$categoryy)->sub_categories()
                                ->create(['name' => $subCat->value, 'description' => 'Proposed Category']);
                            $cat->status = "proposed";
                            $cat->save();
                            $user_subcategories->push(SubCategory::find($cat->id));
                        }
                        else $user_subcategories->push(SubCategory::find($subCat->id));
                    }
                }

                /* Storing Profile Picture */
                if (request('profile'))
                {
                    $tempPath = "";
                    $document = new Document();
                    if (!is_null(Document::where('user_id', Auth::user()->id)
                        ->get()
                        ->where('type', 'profile_picture')
                        ->first()))
                    {
                        $document = Document::where('user_id', Auth::user()->id)
                            ->get()
                            ->where('type', 'profile_picture')
                            ->first();
                        $tempPath = Document::where('user_id', Auth::user()->id)
                            ->get()
                            ->where('type', 'profile_picture')
                            ->first()->path;
                    }
                    $document->path = request('profile')
                        ->store('userprofile');
                    $document->type = 'profile_picture';
                    $document->user()
                        ->associate($user->id);

                    $document->save();
                    if ($tempPath) Storage::delete($tempPath);
                };

                /* Storing certificate*/
                    $Certificate = "[" . $request->totalCertificateList . "]";
                    $Certificate1 = str_replace('},]', '}]', $Certificate);
                    $skills_certificate = new Collection();
                    $skills_experince = new Collection();
                    foreach (json_decode($Certificate1) as $certificateArray)
                    {
                        $document = new Document();
                        $tempPath = "";
                        $id = $certificateArray->fieldId;
                        $experience = 'experience' . $id;
                        $cid = "certificate".$id;
                        if (!is_null(Document::where('user_id', Auth::user()->id)
                            ->get()
                            ->where('type', 'certificate' . $id)->first()))
                        {
                            $document = Document::where('user_id', Auth::user()->id)
                                ->get()
                                ->where('type', 'certificate' . $id)->first();
                            $tempPath = Document::where('user_id', Auth::user()->id)
                                ->get()
                                ->where('type', 'certificate' . $id)->first()->path;
                        }
                        if(isset($request->$cid))
                        $document->path = request($cid)->store('certificates');
                        $document->type = $cid;
                        $document->experience = $request->$experience;
                        $document->user()
                            ->associate($user->id);
                        $document->save();
                        if ($tempPath) Storage::delete($tempPath);
                    }

                /*  storing Reference */
                $Refernces = "[" . $request->totalRefList . "]";
                $Refernces1 = str_replace('},]', '}]', $Refernces);
                $user_references = new Collection();
                foreach (json_decode($Refernces1) as $referencesArray)
                {

                    $references = new References();
                    $id = $referencesArray->fieldId;

                    $references_name = 'referal_name' . $id;
                    $references_email = 'referal_email' . $id;
                    $references_phone = 'referal_phone' . $id;
                    $references->refname = request($references_name);
                    $references->refemail = request($references_email);
                    $references->refphone = request($references_phone);
                    $references->user()
                        ->associate($user->id);
                    $references->save();

                }
                /*inserting Education qualification */
                $education = ['education_institution_name' => $request->educationinstutional_name, 'degree' => $request->degree, 'start_date' => $request->start_date, 'end_date' => $request->end_date, ];
                $user->educations()
                    ->create($education);

                /* Storing radio button value */
                if ($request->police_report == "1")
                {
                    $user->is_police_record = 1;
                }
                elseif ($request->police_report == "0")
                {
                    $user->is_police_record = 0;
                }
                if ($request->is_travelling == "1")
                {
                    $user->is_travelling = 1;
                }
                elseif ($request->is_travelling == "0")
                {
                    $user->is_travelling = 0;
                }

                /* Converting skills array */
                $skillArray = array();
                foreach (json_decode($request->sub_categories) as $category)
                {
                    array_push($skillArray, $category->value);
                }
                /* converting  days array */
                $dayArray = array();
                foreach (json_decode($request->working_days) as $days)
                {
                    array_push($dayArray, $days->value);
                }
                $user->hours = $request->hours;
                $user->days = implode(',', $dayArray);
                $user->introduction = $request->personal_description;
                $user->street_01 = $request->street_01;
                $user->street_02 = $request->street_02;
                $user->city_id = $request->cities;
                $user->total_distance = $request->total_distance;
                $user->subcategories()
                    ->attach($user_subcategories);
                $user->status = "pending";
                $user->save();
                $city = $user->city;
                Mail::to($email, $request->name)->send(new CreateProfile($request,$user_subcategories,$city,'Profile Application Submitted'));
                return redirect('/profile');
            }
            catch(Throwable $e)
            {
                dd($e);
                LogHelper::storeMessage("Profile Wizard", $e->getMessage() , $user);
                return redirect()->route('profileWizard')
                    ->withInput();
            }

        }

        /*   Edit Application if skilled worker already fillup application */

        else if (auth()
            ->user()->status == 'pending')
        {
            try
            {
                $user = User::with('city.parish')->find(auth()->id());
                $email = auth()->user()->email();
                $Subb = "[" . $request->totalCatList . "]";
                $Subb = str_replace('},]', '}]', $Subb);
                $user_subcategories = new Collection();
                $new = collect();
                foreach (json_decode($Subb) as $subCattArray)
                {
                    $subCatt = 'sub_categories' . $subCattArray->fieldId;
                    $categoryy = 'skills_category' . $subCattArray->fieldId;
                    foreach (json_decode($request->$subCatt) as $subCat)
                    {
                        if (empty($subCat->id))
                        {
                            $cat = Category::find($request->$categoryy)->sub_categories()
                                ->create(['name' => $subCat->value, 'description' => 'Proposed Category']);
                            $cat->status = "proposed";
                            $cat->save();
                            $user_subcategories->push(SubCategory::find($cat->id));
                        }
                        else $user_subcategories->push(SubCategory::find($subCat->id));
                    }
                }

                /* Storing Profile Picture */
                if (request('profile'))
                {
                    $tempPath = "";
                    $document = new Document();
                    if (!is_null(Document::where('user_id', Auth::user()->id)
                        ->get()
                        ->where('type', 'profile_picture')
                        ->first()))
                    {
                        $document = Document::where('user_id', Auth::user()->id)
                            ->get()
                            ->where('type', 'profile_picture')
                            ->first();
                        $tempPath = Document::where('user_id', Auth::user()->id)
                            ->get()
                            ->where('type', 'profile_picture')
                            ->first()->path;
                    }
                    $document->path = request('profile')
                        ->store('userprofile');
                    $document->type = 'profile_picture';
                    $document->user()
                        ->associate($user->id);

                    $document->update();
                    if ($tempPath) Storage::delete($tempPath);
                };

                /* Storing certificate*/
                $Certificate = "[" . $request->totalCertificateList . "]";
                $Certificate1 = str_replace('},]', '}]', $Certificate);
                $skills_certificate = new Collection();
                $skills_experince = new Collection();
                foreach (json_decode($Certificate1) as $certificateArray)
                {
                    $document = new Document();
                    $tempPath = "";
                    $id = $certificateArray->fieldId;
                    $experience = 'experience' . $id;
                    if (!is_null(Document::where('user_id', Auth::user()->id)
                        ->get()
                        ->where('type', 'certificate' . $id)->first()))
                    {
                        $document = Document::where('user_id', Auth::user()->id)
                            ->get()
                            ->where('type', 'certificate' . $id)->first();
                        $tempPath = Document::where('user_id', Auth::user()->id)
                            ->get()
                            ->where('type', 'certificate' . $id)->first()->path;
                    }
                    $cid = "certificate".$id;
                    if(isset($request->$cid))
                    $document->path = request($cid)->store('certificates');
                    $document->type = $cid;
                    $document->experience = $request->$experience;
                    $document->user()
                        ->associate($user->id);
                    $document->update();
                    if ($tempPath) Storage::delete($tempPath);
                }

                /*  storing Reference */
                $Refernces = "[" . $request->totalRefList . "]";
                $Refernces1 = str_replace('},]', '}]', $Refernces);
                $user_references = new Collection();
                foreach (json_decode($Refernces1) as $referencesArray)
                {

                    $references = new References();
                    $id = $referencesArray->fieldId;

                    $references_name = 'referal_name' . $id;
                    $references_email = 'referal_email' . $id;
                    $references_phone = 'referal_phone' . $id;
                    $references->refname = request($references_name);
                    $references->refemail = request($references_email);
                    $references->refphone = request($references_phone);
                    $references->user()
                        ->associate($user->id);
                    $references->update();

                }
                /*inserting Education qualification */
                $education = ['education_institution_name' => $request->educationinstutional_name, 'degree' => $request->degree, 'start_date' => $request->start_date, 'end_date' => $request->end_date, ];
                $user->educations()
                    ->update($education);

                /* Storing radio button value */
                if ($request->police_report == "1")
                {
                    $user->is_police_record = 1;
                }
                elseif ($request->police_report == "0")
                {
                    $user->is_police_record = 0;
                }
                if ($request->is_travelling == "1")
                {
                    $user->is_travelling = 1;
                }
                elseif ($request->is_travelling == "0")
                {
                    $user->is_travelling = 0;
                }

                /* Converting skills array */

                /* converting  days array */
                $dayArray = array();
                foreach (json_decode($request->working_days) as $days)
                {
                    array_push($dayArray, $days->value);
                }

                $user->hours = $request->hours;
                $user->days = implode(',', $dayArray);
                $user->introduction = $request->personal_description;
                $user->street_01 = $request->street_01;
                $user->street_02 = $request->street_02;
                $user->city_id = $request->cities;
                $user->total_distance = $request->total_distance;
                $user->subcategories()
                    ->attach($user_subcategories);
                $user->status = "pending";
                $user->update();
                $city = $user->city;
                Mail::to($email, $request->name)->send(new CreateProfile($request,$user_subcategories,$city,'Profile Application Updated'));
                return redirect()->route('viewUser',auth()->id());
            }
            catch(Throwable $e)
            {
                dd($e);
                LogHelper::storeMessage("Profile Wizard", $e->getMessage() , $user);
                return redirect()->route('profileWizard')
                    ->withInput();
            }

        }

    }

    public function security()
    {
        $user = auth()->user();
        return view('admin.profile.security', compact('user'));
    }
    public function viewSecurity($id)
    {
        $user = User::with('emails', 'phones', 'documents')->find($id);
        if ($user == Auth::user())
        {
            return redirect()->route('accountSecurity');
        }
        return view('admin.profile.security', compact('user'));
    }
    public function changePassword(Request $request)
    {
        $user = User::find(auth()->id());
        if (!Hash::check($request->old_password, $user->password))
        {
            ToastHelper::showToast("Old Password doesn't match.", "error");
            return redirect()
                ->route('accountSecurity')
                ->withInput($request->input());
        }
        else
        {
            $user->password = Hash::make($request->new_password);
            $user->save();
            ToastHelper::showToast("Password has been changed.");
            return redirect()
                ->route('accountSecurity');
        }
    }
    public function addEmail(Request $request)
    {
        $user = User::with('emails')->find($request->user);
        try
        {
            $email = $request->validate(['email' => ['required', 'string', 'email', 'unique:emails,email', 'max:255'], ]);
            $user->emails()
                ->create($email);
            return redirect()->back();
        }
        catch(Throwable $e)
        {
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
        return redirect()
            ->route('logout');
    }
    public function deleteUser()
    {
        $user = User::find(auth()->id());
        $user->status = "deleted";
        $user->save();
        ToastHelper::showToast('Account successfully deleted.');
        return redirect()
            ->route('logout');
    }

    public function changeStatus(Request $request)
    {
        $user = User::find($request->user);
        $user->status = $request->status;
        $user->save();
        ToastHelper::showToast('User Status Changed.');
        $email = $user->getEmail($request->user);
        Mail::to($email)->send(new ChangeStatus($user,$request->status));
        if ($user->id == auth()->id() && ($request->status == 'deactivated' || $request->status == 'deleted'))
        {
            auth()->logout();
        }
        return redirect()
            ->back();
    }
    public function makePrimary($email)
    {
        $emails = auth()->user()
            ->emails();
        foreach ($emails->get() as $e)
        {
            $e->primary = false;
            $e->save();
        }
        $em = Email::where('email', $email)->first();
        $em->primary = true;
        $em->save();
        ToastHelper::showToast('Email ' . $email . ' set as primary email.');
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
        $user = User::with('subcategories', 'reviews')->find($id);
        if ($user == Auth::user())
        {
            return redirect()->route('profileSkills');
        }
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
        try
        {
            $user->gender = $request->gender;
            $user->city_id = $request->city;
            $user->street_01 = $request->street_01;
            $user->street_02 = $request->street_02;
            $user->companyname = $request->companyname;
            $user->website = $request->website;
            $user->is_travelling = $request->is_travelling;
            $user->is_police_record = $request->is_police_record;
            $user->introduction = $request->introduction;
            $user->hours = $request->hours;
            $user->days = $request->days;
            $user->areas_covering = $request->areas_covering;
            if (request()
                ->hasFile('profile_image'))
            {
                $tempPath = "";
                $document = new Document();
                if (!is_null(Document::where('user_id', Auth::user()->id)
                    ->get()
                    ->where('type', 'profile_picture')
                    ->first()))
                {
                    $document = Document::where('user_id', Auth::user()->id)
                        ->get()
                        ->where('type', 'profile_picture')
                        ->first();
                    $tempPath = Document::where('user_id', Auth::user()->id)
                        ->get()
                        ->where('type', 'profile_picture')
                        ->first()->path;
                }
                $document->path = request('profile_image')
                    ->store('userprofile');
                $document->type = 'profile_picture';
                $document->user()
                    ->associate($user->id);
                $document->save();
                if ($tempPath) Storage::delete($tempPath);
            }
            else
            {
            }
            $user->save();
            ToastHelper::showToast('Profile has been updated');
            return redirect()
                ->route('viewProfile');
        }
        catch(Throwable $e)
        {
            ToastHelper::showToast('Profile cannot be updated.', 'error');
            LogHelper::store('User', $e);
        }
    }

    public function editUserProfile($id)
    {
        if (User::find($id) == auth()->user())
        {
            return redirect()->route('editProfile');
        }
        $user = User::find($id);
        $parishes = City::all();
        return view('pages.editProfile', compact('user', 'parishes'));
    }

    public function putEditUserProfile(Request $request, $id)
    {
        $user = User::find($id);
        // dd($user,request()->all());
        try
        {
            $request->validate([
                'gender' => 'required',
                'city' => 'required',
                'street_01' => 'required',
                'hours' => 'required',
                'days' => 'required',
                'street_02' => '',
                'companyname' => '',
                'experience' => '',
                'website' => '',
                'is_travelling' => 'required',
                'is_police_record' => 'required'
            ]);
            $user->gender = $request->gender;
            $user->city_id = $request->city;
            $user->street_01 = $request->street_01;
            $user->street_02 = $request->street_02;
            $user->companyname = $request->companyname;
            // $user->experience = $request->experience;
            $user->website = $request->website;
            $user->is_travelling = $request->is_travelling;
            $user->hours = $request->hours;
            $user->days = $request->days;
            $user->is_police_record = $request->is_police_record;
            if (request()
                ->hasFile('profile_image'))
            {
                $tempPath = "";
                $document = new Document();
                if (!is_null(Document::where('user_id', $user->id)
                    ->get()
                    ->where('type', 'profile_picture')
                    ->first()))
                {
                    $document = Document::where('user_id', $user->id)
                        ->get()
                        ->where('type', 'profile_picture')
                        ->first();
                    $tempPath = Document::where('user_id', $user->id)
                        ->get()
                        ->where('type', 'profile_picture')
                        ->first()->path;
                }
                $document->path = request('profile_image')
                    ->store('userprofile');
                $document->type = 'profile_picture';
                $document->user()
                    ->associate($user->id);
                $document->save();
                if ($tempPath) Storage::delete($tempPath);
            }
            $user->save();
            ToastHelper::showToast('Profile has been updated');
        }
        catch(Throwable $e)
        {
            ToastHelper::showToast('Profile cannot be updated.', 'error');
            LogHelper::store('User', $e);
        }
        return redirect()->route('editUserProfile',$user->id);
    }
    public function putEditSocial(Request $request)
    {
        $user = User::find(auth()->id());
        try
        {
            $user->facebook = $request->facebook;
            $user->twitter = $request->twitter;
            $user->instagram = $request->instagram;
            $user->save();
            ToastHelper::showToast('Social Links has been updated');
            return redirect()
                ->route('viewProfile');
        }
        catch(Throwable $e)
        {
            ToastHelper::showToast('Social Links be updated.', 'error');
            LogHelper::store('UserSocial', $e);
        }
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
        $validator = Validator::make($request->all() , ['name' => 'required', 'email' => 'required|unique:emails,email', 'phone' => 'required|unique:phones,phone', 'gender' => 'required', 'type' => 'required', 'city_id' => 'required', 'street_01' => 'required'], ['unique' => 'This :attribute already exists. Please try another one.']);
        if ($validator->fails())
        {
            return redirect()
                ->back()
                ->withInput(request()
                ->all())
                ->withErrors($validator);
        }
        $data = request()->except('email', 'phone');
        $new = ['email_verified_at' => now() , 'status' => $request->type == 'independent_contractor' ? 'new' : 'active'];
        $user = User::create(array_merge($data, $new));
        $user->emails()
            ->create(['email' => $request->email, 'primary' => true, 'verified' => false]);
        $user->phones()
            ->create(['phone' => $request->phone, 'primary' => true, ]);
        $token = Str::random(32);
        DB::table('password_resets')->insert(['email' => $request->email, 'token' => $token, 'created_at' => now() ]);
        Mail::to($request->email, $request->name)->send(new AdminAddUser($user,$token));
        ToastHelper::showToast('User Account Created.');
        return redirect()
            ->route('viewUser', $user->id);
    }

    public function profileDocuments()
    {
        $certificates = auth()->user()->allCategories();
        $certs = collect();
        if($certificates->count() > 0) {
            foreach($certificates as $index=>$certificate)
            {
                $path = $certificate['document']->path;
                if(isset($path))
                $certs->put($index,[
                    'path'=> $path,
                    'category_name' => $certificate['category']['category_name']
                    ]);
            }
        }
        return view('admin.profile.documents', compact('certs'));
    }
    public function userDocuments($id)
    {
        $user = User::with('documents')->find($id);
        $certificates = $user->allCategories();
        $certs = collect();
        if($certificates->count() > 0) {
            foreach($certificates as $index=>$certificate)
            {
                $path = $certificate['document']->path;
                if(isset($path))
                $certs->put($index,[
                    'path'=> $path,
                    'category_name' => $certificate['category']['category_name']
                    ]);
            }
        }
        if ($user == auth()->user())
        {
            return redirect()
                ->route('viewDocuments');
        }
        return view('admin.profile.documents', compact('user','certs'));
    }

    public function profileEducations()
    {
        $user = auth()->user();
        return view('admin.profile.education', compact('user'));
    }
    public function userEducations($id)
    {
        $user = User::with('educations', 'reviews', 'documents')->find($id);
        if ($user == auth()->user())
        {
            return redirect()
                ->route('viewEducations');
        }
        return view('admin.profile.education', compact('user'));
    }
    public function profileReferences()
    {
        $user = auth()->user();
        return view('admin.profile.reference', compact('user'));
    }
    public function userReferences($id)
    {
        $user = User::with('references', 'documents', 'reviews')->find($id);
        if ($user == auth()->user())
        {
            return redirect()
                ->route('viewReferences');
        }
        return view('admin.profile.reference', compact('user'));
    }

    public function profileReview()
    {
        $user = auth()->user();
        $reviews = $user->reviews;
        return view('admin.profile.review', compact('user', 'reviews'));
    }
    public function userReview($id)
    {
        $user = User::with(['reviews.reviewer.documents'])->find($id);
        if ($user == auth()->user())
        {
            return redirect()
                ->route('viewReview');
        }
        $reviews = $user->reviews;
        return view('admin.profile.review', compact('user', 'reviews'));
    }

    public function postUserReview(Request $request, $id)
    {
        Review::create(['review_by' => auth()->id() , 'review_for' => $id, 'type' => 'user', 'review' => $request->reviewText, 'rating' => $request->rating]);
        return redirect()
            ->route('viewUserReview', $id);
    }
    public function createProfilewithSub($subCatId)
    {

        if (!empty($subCatId)) session()->flash('subCatId', $subCatId);
        return redirect()->route('ProfileWizard');
    }
    public function downloadcertificate($filename)
    {
        $file = 'certificates/' . $filename;
        return Storage::download($file);

    }

    public function referGet()
    {
        $user = User::with('refers.user', 'referrer.referral')->find(auth()
            ->id());
        $referral = $user->referral;
        $refers = $user->refers;
        return view('pages.refer', compact('refers', 'referral'));
    }
    public function referPost(Request $request)
    {
        $validator = Validator::make($request->all() , ['email' => 'required|unique:emails,email', ], ['email.unique' => 'This :attribute is already registered. Try another one.']);
        if ($validator->fails())
        {
            return redirect()
                ->back()
                ->withErrors($validator);
        }
        else
        {
            $refer = new Refer();
            $refer->email = $request->email;
            $refer->referred_by = auth()
                ->id();
            $refer->token = $token = Str::random(15);
            $refer->save();
            Mail::to($request->email)->send(new ReferralEmail($refer));
            return redirect()
                ->route('referGet');
        }
    }
    public function registerWithToken($token)
    {
        $user = Refer::where('token', $token)->first();
        if (!$user) ToastHelper::showToast('Invalid referral token.', 'error');
        else session()->flash('referral', $user);
        return redirect()->to('/register');
    }

    /* Ashish Pokhrel */

    public function approveApplication($id)
    {
        $user = User::find($id);
        $user->status = "active";
        $user->update();

        return redirect()
            ->route('applicantUsers');
    }

    public function rejectApplication($id)
    {
        $user = User::find($id);
        $user->status = "declined";
        $user->update();
        return redirect()
            ->route('applicantUsers');
    }

}

