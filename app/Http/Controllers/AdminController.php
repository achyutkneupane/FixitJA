<?php

// @Author Achyut Neupane

namespace App\Http\Controllers;

use App\Models\ErrorLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}