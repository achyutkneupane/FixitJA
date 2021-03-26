<?php

namespace App\Http\Controllers;

use App\Helpers\LogHelper;
use App\Helpers\ToastHelper;
use App\Models\Category;
use App\Models\City;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Document;
use App\Models\Parish;
use App\Models\SubCategory;
use App\Models\Task;
use App\Models\TaskCreator;
use App\Models\TaskWorkingLocation;
use Illuminate\Contracts\Session\Session;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Throwable;

class MainController extends Controller
{
    public function home()
    {
        $users = User::limit(6)
          ->where('type','independent_contractor')
          ->with(['subcategories'])
          ->where('status', 'active')->get();
        $documents = DB::table('users')
            ->join('documents', 'users.id', '=', 'documents.user_id')
            ->select('users.*', 'documents.path', 'documents.type')
            ->get();



        //dd($documents->where('type','profile_picture')->where('id','12')->first());
        $navBarCategories = Category::limit(6)->with(['sub_categories' => function($query){ return $query->whereBetween('id',[8,14]);}])->get();
        $categories = $categories = Category::with('sub_categories')->get();


        $page_title = 'Welcome';
        $page_description = 'This is welcome page';
        return view('pages.welcome', compact('page_title', 'page_description','categories','navBarCategories'), ['users' => $users, 'documents' => $documents, "show_sidebar" => false, "show_navbar" => true]);
    }
    public function about()
    {
        $page_title = 'About';
        $page_description = 'This is about us page';
        $navBarCategories = Category::limit(6)->with(['sub_categories' => function($query){ return $query->whereBetween('id',[8,14]);}])->get();
        return view('pages.about', compact('page_title', 'page_description', 'navBarCategories'), ["show_sidebar" => false, "show_navbar" => true]);
    }
    public function services()
    {
        $page_title = 'Services';
        $page_description = 'This is services page';
        $navBarCategories = Category::limit(6)->with(['sub_categories' => function($query){ return $query->whereBetween('id',[8,14]);}])->get();
        return view('pages.services', compact('page_title', 'page_description', 'navBarCategories'), ["show_sidebar" => false, "show_navbar" => true]);
    }
    public function howItWorks()
    {
        $page_title = 'How It Works';
        $page_description = 'This is description about how FixitJA Works';
        $navBarCategories = Category::limit(6)->with(['sub_categories' => function($query){ return $query->whereBetween('id',[8,14]);}])->get();
        return view('pages.howItWorks', compact('page_title', 'page_description', 'navBarCategories'), ["show_sidebar" => false, "show_navbar" => true]);
    }
    public function hiringProcess()
    {
        $page_title = 'Hiring process';
        $page_description = 'This is page about Hiring Process';
        $navBarCategories = Category::limit(6)->with(['sub_categories' => function($query){ return $query->whereBetween('id',[8,14]);}])->get();
        return view('pages.hiringProcess', compact('page_title', 'page_description', 'navBarCategories'), ["show_sidebar" => false, "show_navbar" => true]);
    }
    public function contact()
    {
        $page_title = 'Contact';
        $page_description = 'This is contact us page';
        $navBarCategories = Category::limit(6)->with(['sub_categories' => function($query){ return $query->whereBetween('id',[8,14]);}])->get();
        return view('pages.contact', compact('page_title', 'page_description', 'navBarCategories'), ["show_sidebar" => false, "show_navbar" => true]);
    }
    public function submitContact(Request $request){
        Mail::send('mail.contactMail', compact('request'), function($message) use ($request)
        {
            $message->subject('Contact Us | FixitJA')->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))->to(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        });
        ToastHelper::showToast('Email Sent Successfully');
        return redirect()->back();
    }
    public function faqs()
    {
        $page_title = 'FAQs';
        $page_description = 'This is frequently asked questions page';
        $navBarCategories = Category::limit(6)->with(['sub_categories' => function($query){ return $query->whereBetween('id',[8,14]);}])->get();
        return view('pages.faqs', compact('page_title', 'page_description', 'navBarCategories'), ["show_sidebar" => false, "show_navbar" => true]);
    }

    public function underConstruction()
    {
        $page_title = 'Under Construction';
        $page_description = 'This is under construction page.';
        return view('pages.underConstruction', compact('page_title', 'page_description', 'navBarCategories'), ["show_sidebar" => false, "show_navbar" => false]);
    }

    public function termsandconditions()
    {
        $page_title = 'Terms & Conditions';
        $page_description = 'Our terms and conditions for all users.';
        $navBarCategories = Category::limit(6)->with(['sub_categories' => function($query){ return $query->whereBetween('id',[8,14]);}])->get();
        return view('pages.termsAndConditions', compact('page_title', 'page_description', 'navBarCategories'), ["show_sidebar" => false, "show_navbar" => true]);
    }


    public function createProject()
    {

        
        $page_title = 'Create Project Wizard';
        $page_description = 'This is create project wizard page';
        $user = Auth::user();
        $task = Task::all();
        $cats = Category::with('sub_categories')->get();
        $subs = SubCategory::all();
        $parishes = Parish::all();
        $navBarCategories = Category::limit(6)->with(['sub_categories' => function($query){ return $query->whereBetween('id',[8,14]);}])->get();
        if(!empty(auth()->user()))
           
            return view('pages.createTaskWizard', compact('page_title', 'page_description','subs','cats','cities','user', 'task'), ["show_sidebar" => false, "show_navbar" => true]);
        else
            return view('pages.createTaskWizard', compact('page_title', 'page_description','subs','cats','parishes', 'navBarCategories'), ["show_sidebar" => false, "show_navbar" => true]);
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
        $Subb = "[".$request->totalProjectCatList."]";
        $Subb = str_replace('},]','}]',$Subb);
        $Subb = json_decode($Subb);
        $all_cats = collect();
        $taskList = collect();
        $parentTask = new Task();
        foreach($Subb as $index => $subCattArray) {
            $subCatt = 'sub_categories'. $subCattArray->fieldId;
            $categoryy = 'categoryTemplate'. $subCattArray->fieldId;
            $task_subcategories = new Collection();
            $jsonSubCat = json_decode($request->$subCatt);
            foreach($jsonSubCat as $subCat){
                if(empty($subCat->id)){
                    $cat = Category::find($request->$categoryy)->sub_categories()->create([
                        'name' => $subCat->value,
                        'description' => 'Proposed Category'
                    ]);
                    $cat->status = "proposed";
                    $cat->save();
                    $task_subcategories->push($cat);
                    $all_cats->push($cat);
                }
                else {
                    $subCatToPush = SubCategory::find($subCat->id);
                    $task_subcategories->push($subCatToPush);
                    $all_cats->push($subCatToPush);
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
            if($index == 0)
                $parentTask = $task;
            else
                $taskList->push($task->id);
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
            $task->creator()->save($creator);

            //Task Location Store
            if(!$request->user_equal_working) {
                $location = new TaskWorkingLocation();
                $location->city_id = $request->site_city;
                $location->street_01 = $request->site_street_01;
                $location->street_02 = $request->site_street_02;
                $location->house_number = $request->site_house_number;
                $location->postal_code = $request->site_postal_code;
                $task->location()->save($location);
            }
            $task->subcategories()->attach($task_subcategories);
        }
        $city = City::with('parish')->find($request->city);
        $site_city = City::with('parish')->find($request->site_city);
        try {
            Mail::send('mail.createTask', compact('request','all_cats','city','site_city'), function($message) use ($request)
            {
                $message->to($request->email, $request->user_name)->subject('Task Created');
            });
        } catch(Throwable $e) {
            LogHelper::storeMessage('Create task E-mail',$e->getMessage(),auth()->user(),'Email Cant be sent.');
        }
        $parentTask->related_tasks()->attach($taskList);
        return redirect()->route('listTask');
    }
    public function categories()
    {
        $categories = Category::with('sub_categories')->get();
        $page_title = 'Categories';
        $page_description = 'This is view all categories page';
        $navBarCategories = Category::limit(6)->with(['sub_categories' => function($query){ return $query->whereBetween('id',[8,14]);}])->get();
        return view('pages.categories', compact('page_title', 'page_description', 'categories', 'navBarCategories'), ["show_sidebar" => false, "show_navbar" => true]);
    }
    public function test()
    {
        $parishes = Parish::all();
        return view('pages.test', compact('parishes'));
    }
}
