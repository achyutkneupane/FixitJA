<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

use function GuzzleHttp\Promise\all;

class UserController extends Controller
{
    // creating folder to store document

    protected $documents_dir = "uploads/douments";

    public function update(User $user)
    {
        $user = new User();
        $user = Auth::user();
        if (request('password')) {
            request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
                'password' => ['string', 'min:8'],
                'old_password' => ['required'],
                'phone' => ['required', 'numeric', 'min:8', Rule::unique('users')->ignore($user)],
                'profile_image' => ['mimes:jpeg,png,gif', 'max:4096', 'file'],
            ]);
        } else
            request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
                'old_password' => ['required'],
                'phone' => ['required', 'numeric', 'min:8', Rule::unique('users')->ignore($user)],
                'profile_image' => ['mimes:jpeg,png,gif', 'max:4096', 'file'],
            ]);

        if (Hash::check(request('old_password'), Auth::user()->password)) {
            if (request('password')) {
                $user->password = Hash::make(request('password'));
            }
            $user->update(
                [
                    'name' => request('name'),
                    'email' => request('email'),
                    'phone' => request('phone'),
                ]
            );

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
        $user = User::find(Auth::user()->id);
        return view('pages.profile', compact('user'));
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('pages.profile', compact('user'));
    }
    public function index()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function uploadfile($file, $dir)
    {
        $file_extension = $file->getClientOriginalExtension();
        $file_name = md5(time()). '.' .$file_extension;
        $file -> move($dir,$file_name);
        return $file_name;
    }
    public function updateprofile(User $user)
    {
        $user = Auth::user();
        request()->validate([
            'street1'      => ['required'],
            'city'         => ['required'],
            'introduction' => ['required','min:100'],
            'areas_covering' => ['required'],
            'certificate'    => ['nullable'],
            'is_police_record' => ['required'],
            'is_travelling'   => ['required'],
        ]);

        return view('pages.createProfileWizard');
    }
}