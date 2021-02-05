<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        $users = User::all();
        $documents = DB::table('users')
            ->join('documents', 'users.id', '=', 'documents.user_id')
            ->select('users.*', 'documents.path', 'documents.type')
            ->get();

            // dd($documents->where('type','profile_picture')->where('id','1')->first()->path);
        return view('pages.welcome', ['users' => $users, 'documents' => $documents, "show_sidebar" => false]);
    }
}
