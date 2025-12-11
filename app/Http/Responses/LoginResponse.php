<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;

class LoginResponse
{
    public function toResponse($request)
    {
        $role = Auth::user()->role;

        if ($role === 'admin') {
            return redirect()->route('admin.home');
        }

        if ($role === 'seller') {
            return redirect()->route('seller.dashboard');
        }

        return redirect()->route('dashboard'); // member
    }
}