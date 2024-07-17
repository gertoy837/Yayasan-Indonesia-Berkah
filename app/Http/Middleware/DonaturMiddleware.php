<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonaturMiddleware
{
    public function handle($request, Closure $next)
{
    if (auth()->user() && auth()->user()->role == 'donatur') {
        return $next($request);
    }
    return redirect('/donaturdashboard')->with('error', 'You have no access to this section');
}
}
