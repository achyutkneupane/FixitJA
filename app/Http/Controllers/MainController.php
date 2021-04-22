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
use App\Models\StaticText;
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
          ->with(['subcategories.category','documents','city'])
          ->where('status', 'active')->get();
        
        $documents = DB::table('users')
            ->join('documents', 'users.id', '=', 'documents.user_id')
            ->select('users.*', 'documents.path', 'documents.type')
            ->get();
            
        $categories = Category::with(['sub_categories' => function($query){ return $query->whereBetween('id',[8,14]);}])->get();
        $navBarCategories = $categories;
        // $navBarCategories = $categories->with(['sub_categories' => function($query){ return $query->whereBetween('id',[8,14]);}])->get();


        $page_title = 'Welcome';
        $page_description = 'This is welcome page';
        $statics = StaticText::get();
        return view('pages.welcome', compact('page_title', 'page_description','categories','navBarCategories','statics'),  ['users' => $users, 'documents' => $documents, "show_sidebar" => false, "show_navbar" => true]);
    }
    public function about()
    {
        $content = StaticText::where('slug','about_fixitja')->first();
        $page_title = 'About';
        $page_description = 'This is about us page';
        $navBarCategories = Category::limit(6)->with(['sub_categories' => function($query){ return $query->whereBetween('id',[8,14]);}])->get();
        return view('pages.about', compact('page_title', 'page_description', 'navBarCategories','content'), ["show_sidebar" => false, "show_navbar" => true]);
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
        $navBarCategories = Category::limit(6)->with(['sub_categories' => function($query){ return $query->whereBetween('id',[8,14]);}])->get();
        return view('pages.underConstruction', compact('page_title', 'page_description', 'navBarCategories'), ["show_sidebar" => false, "show_navbar" => false]);
    }

    public function termsandconditions()
    {
        $content = StaticText::where('slug','terms_and_conditions')->first();
        $page_title = 'Terms & Conditions';
        $page_description = 'Our terms and conditions for all users.';
        $navBarCategories = Category::limit(6)->with(['sub_categories' => function($query){ return $query->whereBetween('id',[8,14]);}])->get();
        return view('pages.termsAndConditions', compact('page_title', 'page_description', 'navBarCategories','content'), ["show_sidebar" => false, "show_navbar" => true]);
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
 