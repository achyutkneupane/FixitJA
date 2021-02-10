<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function home()
    {
        $users = User::all();
        $documents = DB::table('users')
            ->join('documents', 'users.id', '=', 'documents.user_id')
            ->select('users.*', 'documents.path', 'documents.type')
            ->get();


            // dd($documents->where('type','profile_picture')->where('id','1')->first()->path);
        $page_title = 'Welcome';
        $page_description = 'This is welcome page';
        return view('pages.welcome', compact('page_title', 'page_description'), ['users' => $users, 'documents' => $documents, "show_sidebar" => false, "show_navbar" => true]);
    }
    public function about()
    {
        $page_title = 'About';
        $page_description = 'This is about us page';
        return view('pages.about', compact('page_title', 'page_description'), ["show_sidebar" => false, "show_navbar" => true]);
    }
    public function contact()
    {
        $page_title = 'Contact';
        $page_description = 'This is contact us page';
        return view('pages.contact', compact('page_title', 'page_description'), ["show_sidebar" => false, "show_navbar" => true]);
    }
    public function faqs()
    {
        $page_title = 'FAQs';
        $page_description = 'This is frequently asked questions page';
        return view('pages.faqs', compact('page_title', 'page_description'), ["show_sidebar" => false, "show_navbar" => true]);
    }
    public function createProject()
    {
        $page_title = 'Create Project Wizard';
        $page_description = 'This is create project wizard page';
        return view('pages.createTaskWizard', compact('page_title', 'page_description'), ["show_sidebar" => false, "show_navbar" => true]);
    }

}
