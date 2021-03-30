<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Category;
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
        dd(auth()->user()->allCategories());
        $documents = Document::where('user_id', Auth::user()->id)->get();

        return view('pages.home',['loggedUser' => auth()->user()->with('emails', 'phones')->find(Auth::user()->id),
                'documents' => $documents,
                'show_navbar' => true,
            ]
        );
    }

}
