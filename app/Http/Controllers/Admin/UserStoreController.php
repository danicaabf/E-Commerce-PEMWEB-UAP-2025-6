<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Store;

class UserStoreController extends Controller
{
    public function index()
    {
        $users = User::all();
        $stores = Store::all();

        return view('admin.users', compact('users', 'stores'));
    }
}