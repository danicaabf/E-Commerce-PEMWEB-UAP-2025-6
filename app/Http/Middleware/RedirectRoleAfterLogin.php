<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectRoleAfterLogin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {

            $role = auth()->user()->role;

            if ($role === 'admin') {
                return redirect('/admin');  // masuk ke dashboard admin
            }

            if ($role === 'seller') {
                return redirect('/seller'); // masuk ke dashboard seller
            }

            return redirect('/dashboard'); // member
        }

        return $next($request);
    }
}