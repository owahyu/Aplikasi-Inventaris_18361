<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $level
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $level)
    {
        // Ambil level pengguna yang sedang login
        $userLevel = Auth::user()->level->nama_level;

        // Ambil level yang diizinkan dari parameter middleware
        $allowedLevels = explode('|', $level);

        // Periksa apakah level pengguna termasuk dalam level yang diizinkan
        if (in_array($userLevel, $allowedLevels)) {
            return $next($request);
        }

        // Jika tidak diizinkan, kembalikan respons 403 (Unauthorized)
        abort(403, 'Unauthorized action.');
    }
}
