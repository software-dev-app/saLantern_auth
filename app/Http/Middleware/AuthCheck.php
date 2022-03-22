<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //prevents unauthenticated users from all protected routes
        if(!session()->has('LoggedUser') && ($request->path() !='auth/login' && $request->path() !='auth/register' )){
            return redirect('auth/login')->with('fail','You must be logged in');
        }

        //prevents authenticated user from rerouting to register and login pages
        if(session()->has('LoggedUser') && ($request->path() == 'auth/login' || $request->path() == 'auth/register' ) ){
            return back();
        }

        //prevents logged out user from history back and redirects to login
        return $next($request)->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
                                ->header('Pragma','no-cache')
                                ->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');
                                return $next($request);
    }
}
