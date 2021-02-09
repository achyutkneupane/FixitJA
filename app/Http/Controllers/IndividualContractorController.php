<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class IndividualContractorController extends Controller
{
    public function index(){

        $articleName = 'indivvidualuser';
        return  view('user',['articleName' => 'indivvidualuser']);
        

    }
}
