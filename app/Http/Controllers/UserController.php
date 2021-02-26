<?php

namespace App\Http\Controllers;

use App\Helpers\LogHelper;
use App\Helpers\ToastHelper;
use App\Models\Document;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Throwable;

use function GuzzleHttp\Promise\all;

class UserController extends Controller
{
    public function update(User $user)
    {
        $user = new User();
        $user = User::find(auth()->id());
        if (request('password')) {
            request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('emails')],
                'password' => ['string', 'min:8'],
                'old_password' => ['required'],
                'phone' => ['required', 'numeric', 'min:8', Rule::unique('phones')],
                'profile_image' => ['mimes:jpeg,png,gif,jpg', 'max:4096', 'file'],
            ]);
        } else
            request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('emails')],
                'old_password' => ['required'],
                'phone' => ['required', 'numeric', 'min:8', Rule::unique('phones')],
                'profile_image' => ['mimes:jpeg,png,gif,jpg', 'max:4096', 'file'],
            ]);

        if (Hash::check(request('old_password'), Auth::user()->password)) {
            if (request('password')) {
                $user->password = Hash::make(request('password'));
            }
            $user->update(
                [
                    'name' => request('name'),
                ]
            );
            $user->emails()->update([
                'email' => request('email'),
                'primary' => true
            ]);
            $user->phones()->update([
                'email' => request('phone'),
                'primary' => true
            ]);

            if (request('profile_image')) {
                $tempPath = "";
                $document = new Document();
                if (!is_null(Document::where('user_id', Auth::user()->id)->get()->where('type', 'profile_picture')->first())) {
                    $document = Document::where('user_id', Auth::user()->id)->get()->where('type', 'profile_picture')->first();
                    $tempPath = Document::where('user_id', Auth::user()->id)->get()->where('type', 'profile_picture')->first()->path;
                }
                $document->path = request('profile_image')->store('profile_images');
                $document->type = 'profile_picture';
                $document->user()->associate($user->id);
                $document->save();
                if ($tempPath)
                    Storage::delete($tempPath);
            }
            return redirect('/home');
        } else {
            return Redirect::back()->withErrors(['old_password' => 'Old password did not match.'])->withInput();
        }
    }
    public function profile()
    {
        $user = User::with('emails', 'phones')->find(Auth::user()->id)->first();

        return view('pages.profile', compact('user'));
    }
    public function show($id)
    {
        if (User::find($id) == Auth::user()) {
            return redirect()->route('viewProfile');
        }
        $user = User::with('emails', 'phones')->find($id);
        return view('pages.profile', compact('user'));
    }
    public function index()
    {
        $users = User::with('emails', 'phones')->get();
        return view('admin.profile.users', compact('users'));
    }
    public function security()
    {
        $user = User::with('emails', 'phones')->find(Auth::user()->id);
        return view('admin.profile.security', compact('user'));
    }
    public function viewSecurity($id)
    {
        if (User::find($id) == Auth::user()) {
            return redirect()->route('accountSecurity');
        }
        $user = User::with('emails', 'phones')->find($id);
        return view('admin.profile.security', compact('user'));
    }
    public function changePassword(Request $request)
    {
        $user = User::find(auth()->id());
        if (!Hash::check($request->old_password, $user->password)) {
            ToastHelper::showToast("Old Password doesn't match.", "error");
            return redirect()->route('accountSecurity')->withInput($request->input());
        } else {
            $user->password = Hash::make($request->new_password);
            $user->save();
            ToastHelper::showToast("Password has been changed.");
            return redirect()->route('accountSecurity');
        }
    }
    public function addEmail(Request $request)
    {
        $user = User::with('emails')->find($request->user);
        try {
            $email = $request->validate([
                'email' => ['required', 'string', 'email', 'unique:emails,email', 'max:255'],
            ]);
            $user->emails()->create($email);
            return redirect()->back();
        } catch (Throwable $e) {
            dd($e);
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
        return redirect()->route('logout');
    }
    public function deleteUser()
    {
        $user = User::find(auth()->id());
        $user->status = "deleted";
        $user->save();
        ToastHelper::showToast('Account successfully deleted.');
        return redirect()->route('logout');
    }
    public function changeStatus(Request $request)
    {
        $user = User::find($request->user);
        $user->status = $request->status;
        $user->save();
        ToastHelper::showToast('User Status Changed.');
        return redirect()->back();
    }
    public function profileSkills()
    {
        $user = User::find(auth()->id());
        return view('admin.profile.skills', compact('user'));
    }
}