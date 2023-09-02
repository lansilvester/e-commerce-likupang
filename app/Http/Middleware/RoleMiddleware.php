<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();
    
        if (!$user) {
            return redirect('login'); // Redirect jika tidak ada pengguna yang terautentikasi
        }
    
        // Memeriksa apakah pengguna memiliki salah satu dari peran yang diperlukan
        if (!in_array($user->role, $roles)) {
            return abort(403); // Forbidden jika rolenya tidak sesuai
        }
    
        return $next($request);
    }
}
