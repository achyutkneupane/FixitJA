<?php

namespace App\Http\Controllers;

use App\Helpers\ToastHelper;
use App\Models\Category;
use App\Models\City;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Document;
use App\Models\SubCategory;
use App\Models\Task;
use App\Models\TaskCreator;
use App\Models\TaskWorkingLocation;
use Illuminate\Contracts\Session\Session;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function home()
    {
        $users = User::limit(6)->where('type','individual_contractor')->withCount('subcategories')->orderBy('subcategories_count','DESC')->get();
        $documents = DB::table('users')
            ->join('documents', 'users.id', '=', 'documents.user_id')
            ->select('users.*', 'documents.path', 'documents.type')
            ->get();
        //dd($documents->where('type','profile_picture')->where('id','12')->first());
        $categories = Category::get(['id','name']);
        $page_title = 'Welcome';
        $page_description = 'This is welcome page';
        return view('pages.welcome', compact('page_title', 'page_description','categories'), ['users' => $users, 'documents' => $documents, "show_sidebar" => false, "show_navbar" => true]);
    }
    public function about()
    {
        $page_title = 'About';
        $page_description = 'This is about us page';
        return view('pages.about', compact('page_title', 'page_description'), ["show_sidebar" => false, "show_navbar" => true]);
    }
    public function services()
    {
        $page_title = 'Services';
        $page_description = 'This is services page';
        return view('pages.services', compact('page_title', 'page_description'), ["show_sidebar" => false, "show_navbar" => true]);
    }
    public function howItWorks()
    {
        $page_title = 'How It Works';
        $page_description = 'This is description about how FixitJA Works';
        return view('pages.howItWorks', compact('page_title', 'page_description'), ["show_sidebar" => false, "show_navbar" => true]);
    }
    public function hiringProcess()
    {
        $page_title = 'Hiring process';
        $page_description = 'This is page about Hiring Process';
        return view('pages.hiringProcess', compact('page_title', 'page_description'), ["show_sidebar" => false, "show_navbar" => true]);
    }
    public function contact()
    {
        $page_title = 'Contact';
        $page_description = 'This is contact us page';
        return view('pages.contact', compact('page_title', 'page_description'), ["show_sidebar" => false, "show_navbar" => true]);
    }
    public function submitContact(Request $request){
        Mail::send('mail.contactMail', compact('request'), function($message) use ($request)
        {
            $message->subject('Contact Us | FixitJA')->from($request->email,$request->name)->to(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        });
        ToastHelper::showToast('Email Sent Successfully');
        return redirect()->back();
    }
    public function faqs()
    {
        $page_title = 'FAQs';
        $page_description = 'This is frequently asked questions page';
        return view('pages.faqs', compact('page_title', 'page_description'), ["show_sidebar" => false, "show_navbar" => true]);
    }

    public function underConstruction()
    {
        $page_title = 'Under Construction';
        $page_description = 'This is under construction page.';
        return view('pages.underConstruction', compact('page_title', 'page_description'), ["show_sidebar" => false, "show_navbar" => false]);
    }
    public function createProject()
    {
        $page_title = 'Create Project Wizard';
        $page_description = 'This is create project wizard page';
        $user = Auth::user();
        $cats = Category::with('sub_categories')->get();
        $subs = SubCategory::all();
        $cities = City::get();
        if(!empty(auth()->user()))
            return view('pages.createTaskWizard', compact('page_title', 'page_description','subs','cats','cities','user'), ["show_sidebar" => false, "show_navbar" => true]);
        else
            return view('pages.createTaskWizard', compact('page_title', 'page_description','subs','cats','cities'), ["show_sidebar" => false, "show_navbar" => true]);
    }
    public function createProjectwithCat($catId)
    {
        if(!empty($catId))
            session()->flash('catId',$catId);
        return redirect()->route('createProject');
    }
    public function categoryRequest(Request $request)
    {
        session()->flash('catId',$request->catId);
        return redirect()->route('createProject');
    }
    public function createProjectwithSub($subCatId)
    {
        if(!empty($subCatId))
            session()->flash('subCatId',$subCatId);
        return redirect()->route('createProject');
    }
    public function addProject(Request $request)
    {
        // Classify Sub-Categories
        $Subb = "[".$request->totalCatList."]";
        $Subb = str_replace('},]','}]',$Subb);
        $task_subcategories = new Collection();
        $new = collect();
        foreach(json_decode($Subb) as $subCattArray) {
            $subCatt = 'sub_categories'. $subCattArray->fieldId;
            $categoryy = 'categoryTemplate'. $subCattArray->fieldId;
            foreach(json_decode($request->$subCatt) as $subCat){
                if(empty($subCat->id)){
                    $cat = Category::find($request->$categoryy)->sub_categories()->create([
                        'name' => $subCat->value,
                        'description' => 'Proposed Category'
                    ]);
                    $cat->status = "proposed";
                    $cat->save();
                    $task_subcategories->push(SubCategory::find($cat->id));
                }
                else
                    $task_subcategories->push(SubCategory::find($subCat->id));
            }
        }
        // Task Store
        $task = new Task();
        $task->created_by = auth()->id() ? auth()->id() : 1;
        $task->name = $request->name;
        $task->description = $request->description;
        $task->type = $request->type;
        $task->payment_type = $request->payment_type;
        $task->deadline = $request->deadline;
        $task->user_equal_working = $request->user_equal_working;
        $task->is_client_on_site = $request->is_client_on_site;
        $task->is_repair_parts_provided = $request->is_repair_parts_provided;
        $task->save();

        // Task Creator Store
        $creator = new TaskCreator();
        $creator->name = $request->user_name;
        $creator->phone = $request->phone;
        $creator->email = $request->email;
        $creator->city_id = $request->city;
        $creator->street_01 = $request->street_01;
        $creator->street_02 = $request->street_02;
        $creator->house_number = $request->house_number;
        $creator->postal_code = $request->postal_code;
        $creator->perish = $request->perish;
        $task->creator()->save($creator);

        //Task Location Store
        if(!$request->user_equal_working) {
            $location = new TaskWorkingLocation();
            $location->city_id = $request->site_city;
            $location->street_01 = $request->site_street_01;
            $location->street_02 = $request->site_street_02;
            $location->house_number = $request->site_house_number;
            $location->postal_code = $request->site_postal_code;
            $location->perish = $request->site_perish;
            $task->location()->save($location);
        }
        dd($task_subcategories);
        $task->subcategories()->attach($task_subcategories);
        $city1 = City::find($request->city)->name;
        $site_city = City::find($request->site_city)->name;
        Mail::send('mail.createTask', compact('request','task_subcategories','city1','site_city'), function($message) use ($request)
            {
                $message->to($request->email, $request->name)->subject('Task Created');
            });
        return redirect()->route('viewTask',$task->id);
    }
    public function categories()
    {
        $categories = Category::with('sub_categories')->get();
        $page_title = 'Categories';
        $page_description = 'This is view all categories page';
        return view('pages.categories', compact('page_title', 'page_description', 'categories'), ["show_sidebar" => false, "show_navbar" => true]);
    }
     public function updateprofile1($catId = NULL)
    {
        $document = Document::where('user_id', Auth::user()->id)->get();
        $category = Category::with('sub_categories')->get();
        if($catId != NULL)
            session()->flash('catId',$catId);
        return view('pages.createTaskWizard', compact('document', 'category'));
    }
    public function updateprofilewithSub($subCatId = NULL)
   {
    $document = Document::where('user_id', Auth::user()->id)->get();
    $category = Category::with('sub_categories')->get();
    $subs = SubCategory::all();
       if($subCatId != NULL)
           session()->flash('subCatId',$subCatId);
       return view('pages.createTaskWizard', compact('document', 'category','subs'));
   }
}
