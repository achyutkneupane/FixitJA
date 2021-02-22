<?php

/**
 * @author Achyut Neupane
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

//This middleware will check if the user is admin or not. Redirect to homepage if not admin.
class CheckIfAdmin
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
        if ($request->user()->type !== 'admin') {
            return redirect()->route('home');
        }
        return $next($request);
    }
}