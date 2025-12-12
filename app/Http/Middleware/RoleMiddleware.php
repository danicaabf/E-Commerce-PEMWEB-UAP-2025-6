<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!auth()->check()) {
            abort(403, 'Unauthorized');
        }

        $userRole = auth()->user()->role; 

        // jika $role = 'member', seller juga dianggap member
        if ($role === 'member' && ($userRole === 'member' || $userRole === 'seller')) {
            return $next($request);
        }

        // jika $role bukan member, harus cocok persis
        if ($role !== 'member' && $userRole !== $role) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}