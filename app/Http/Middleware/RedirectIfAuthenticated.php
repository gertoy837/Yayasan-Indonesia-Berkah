<?php

namespace App\Http\Middleware;

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
    public function handle(Request $request, Closure $next, ...$guards)
    {
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();

                // Redirect based on role
                switch ($user->role) {
                    case 'santri':
                        return redirect()->route('santri.dashboard');
                    case 'admin':
                        return redirect()->route('admin.dashboard');
                    case 'donatur':
                        return redirect()->route('donatur.dashboard');
                    default:
                        return redirect('/home');
                }
            }
        }

        return $next($request);
    }

}
