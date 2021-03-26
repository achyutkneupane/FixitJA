<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function list($parish){
        return City::where('parish_id',$parish)->get(['id','name']);
    }
}
