<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guard)
    {
        $guards = empty($guards) ? [null] : $guards;

        switch($guard){
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('admin.index');
                }
            break;
            case 'general_user':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('generaluser');
                }
            break;
            case 'business':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('business');
                }
            break;
            case 'individual_contractor':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('individualcontractor');
                }
            break;
    
            default:
                if (Auth::guard($guard)->check()) {
                    return redirect('/login');
                }
            break;

        
    }
    return $next($request);
}
}
