<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotLoggedIn {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null) {
        if (!Auth::check() || empty(Auth::user())) {
//            return redirect('/login');
//            return Redirect::back();
//            return Redirect::back()->withErrors(['msg', 'The Message']);
            return redirect()->route('login')->with('alert-warning', 'Please login.');
        }
        return $next($request);
    }

}
