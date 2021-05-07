<?php

/**
 * @author Achyut Neupane
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

//This middleware will check if the visiting user is associated to the task or not. If not the user will be redirected to tasks list
class relatedTaskOnly
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
        $id = request()->route()->parameter('id');
        if(auth()->user()->associatedTasks()->contains('id',$id)) {
            return $next($request);
        }
        else {
            return redirect()->route('listTask');
        }
    }
}
