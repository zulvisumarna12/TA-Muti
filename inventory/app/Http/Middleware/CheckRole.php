<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // Sesuaikan dengan rute login yang ada
        }

        $userRole = Auth::user()->role; // Asumsikan ada kolom 'role' di tabel pengguna

        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        return redirect('/'); // Atau sesuaikan dengan rute yang sesuai
    }
}
