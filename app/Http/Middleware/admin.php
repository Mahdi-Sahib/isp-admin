<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

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
        if(Auth::user()->status != 1 AND Auth::user()->status != 5 AND Auth::user()->status != 10) {
            return back()
                ->with('message_danger', 'You did not have this permeation.');
        }
        return $next($request);
    }
}
