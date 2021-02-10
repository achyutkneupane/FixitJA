<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class GeneralUserController extends Controller
{
    public  function index(Request $request){

        
        $articleName = 'generaluser';
        return  view('user',['articleName' => 'generaluser']);
    }
}
