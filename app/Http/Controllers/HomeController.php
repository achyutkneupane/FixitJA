<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $documents = Document::where('user_id', Auth::user()->id)->get();
        $cate = Category::with('sub_categories')->get();
        $categories = 
                
       
       
       
        return view(
            'pages.home', compact('categories'),
            [
                'loggedUser' => User::find(Auth::user()->id)->with('emails', 'phones')->first(),
                'documents' => $documents,
                'show_navbar' => true
            ],
            
        );
    }
}