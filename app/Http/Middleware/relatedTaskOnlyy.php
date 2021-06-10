<?php

/**
 * @author Achyut Neupane
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

//This middleware will check if the visiting user is associated to the task or not. If not the user will be redirected to tasks list
class relatedTaskOnlyy
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