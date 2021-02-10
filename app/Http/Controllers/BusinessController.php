<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class BusinessController extends Controller
{
    
        public function index(){

            $articleName = 'businessuser';
            return  view('user',['articleName' => 'businessuser']);
    }
    }

