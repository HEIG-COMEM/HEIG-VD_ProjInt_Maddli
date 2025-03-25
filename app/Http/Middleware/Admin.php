<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    private const ADMIN_ROLES = ['uefa_manager', 'federation_manager', 'club_manager'];

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user()?->roles()->whereIn('name', self::ADMIN_ROLES)->exists()) {
            return $next($request);
        } else {
            return redirect()->route('club.home');
        }
    }
}
