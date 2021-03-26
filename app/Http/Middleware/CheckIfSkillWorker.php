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
       if ($request->user()->type !== 'independent_contractor' && ($request->user()->status !== 'new' || $request->user()->status !== 'pending')) {
            return redirect()->route('home');
        }
        return redirect()->route('home');
    }
}
