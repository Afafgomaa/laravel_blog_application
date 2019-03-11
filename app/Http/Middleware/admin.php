<?php

namespace App\Http\Middleware;
use Session;
use Closure;
use Auth;

class admin
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
        if(!Auth::User()->admin){
            Session::flash('info', 'you dont have permission ');
            return redirect()->back();
        }
        return $next($request);
    }
}
