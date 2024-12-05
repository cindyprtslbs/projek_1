<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAksesMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $routeName = $request->route()->getName(); // Ambil nama route saat ini

        // Cek apakah user memiliki akses ke route/menu tersebut
        $hasAccess = SettingMenuUser::whereHas('menu', function($query) use ($routeName) {
            $query->where('menu_link', $routeName);
        })
        ->where('id_jenis_user', $user->jenis_user_id)
        ->exists();

        if (!$hasAccess) {
            return redirect('/dashboard')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
