<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Request;
use Auth;

class GeneralUser
{
  
    public function handle($request, Closure $next)
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }
  
  
        if(Auth::user()->type == 'general_user') {
            return $next($request);
         
  
        }
  
    }
}
