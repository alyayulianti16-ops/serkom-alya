<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckAuth
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (!empty($roles)) {
            $userRole = Auth::user()->role;

            if (!in_array($userRole, $roles)) {
                abort(403, 'Akses ditolak!');
            }
        }

        return $next($request);
    }
}
