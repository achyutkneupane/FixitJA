<?php

/**
 * @author Achyut Neupane
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

//This middleware will check if the user is general user or not. Redirect to homepage if not general user.
class CheckIfUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->type !== 'general_user') {
            return redirect()->route('home');
        }
        return $next($request);
    }
}