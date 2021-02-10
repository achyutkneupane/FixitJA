<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;


class Business
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
      if(!Auth::check()){
          return redirect()->route('login');
      }

      if(Auth::user()->type == "business") {
        return $next($request);
      }

      if(Auth::user()->type == "individual_contractor") {
        return redirect()->route('individualcontractor');
      }

      if(Auth::user()->type == "general_user") {
        return redirect()->route('generaluser');

      }


    }
}
