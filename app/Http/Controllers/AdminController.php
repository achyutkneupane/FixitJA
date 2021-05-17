<?php

// @Author Achyut Neupane

namespace App\Http\Controllers;

use App\Models\ErrorLog;
use App\Models\StaticText;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function error_log()
    {
        $errors = ErrorLog::orderBy('solved_at', 'ASC')->get();
        return view('admin.errorLog', compact('errors'));
    }
    public function error_detail($id)
    {
        $error = ErrorLog::find($id);
        return view('admin.viewError', compact('error'));
    }
    public function error_solved($id)
    {
        $error = ErrorLog::find($id);
        $error->solved_by = Auth::user()->id;
        $error->solved_at = Carbon::now();
        $error->save();
        session()->flash('toast', ['class' => 'success', 'message' => 'Error solved.']);
        return redirect()->route('viewErrorDetail', $id);
    }
    public function staticTexts()
    {
        $statics = StaticText::get();
        return view('admin.staticTexts',compact('statics'));
    }
    public function postStaticTexts(Request $request, $id)
    {
        $static = StaticText::find($id);
        $static->title = $request->title;
        $static->sub_title = $request->sub_title;
        $static->content = $request->staticContent;
        $static->save();
        return redirect()->route('staticTexts');
    }

    /* Added by Ashish Pokhrel */

    public function newUser()
    {
        $users = User::where('status', 'new')->get();
        return view('admin.profile.newUser', compact('users'));
        

    }

    public function applicantUser()
    {
        $users = User::where('status', 'pending')->get();
        return view('admin.profile.applicantUser', compact('users'));

    }

    public function activeUser()
    {
        $users = User::all();
        return view('admin.profile.activeUser', compact('users'));
    }

    public function rejectedUser()
    {
        $users = User::where('status', 'declined')->get();
        return view('admin.profile.rejectedUser', compact('users'));
    }
}