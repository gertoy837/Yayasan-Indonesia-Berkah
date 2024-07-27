<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Pastikan pengguna sudah login
        if (!Auth::check()) {
            return view('welcome');
        }

        // Ambil pengguna yang sedang login
        $user = Auth::user();

        // Cek apakah pengguna memiliki peran yang sesuai
        if ($user->role !== $role) {
            // Jika tidak, kembalikan respons atau redirect ke halaman lain
            return abort(403);
        }

        return $next($request);
    }

}
