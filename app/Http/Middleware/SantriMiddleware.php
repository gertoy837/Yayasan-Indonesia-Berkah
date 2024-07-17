<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SantriMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->user() && auth()->user()->role == 'santri') {
            return $next($request);
        }
        return redirect('/dashboard')->with('error', 'You have no access to this section');
    }
}
