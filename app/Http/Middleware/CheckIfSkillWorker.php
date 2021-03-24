<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIfSkillWorker
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
       if ($request->user()->status !== 'pending' || $request->user()->status !== 'new')   {
           return $next($request);
            
        }
        return redirect()->route('home');
    }
}
