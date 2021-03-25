<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSkillsWorker
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
         if ($request->user()->type !== 'independent_contractor') {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
