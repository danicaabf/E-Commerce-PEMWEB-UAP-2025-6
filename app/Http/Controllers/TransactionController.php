<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('buyer_id', Auth::id())
                                   ->with('store')
                                   ->latest()
                                   ->get();

        return view('transactions.index', compact('transactions'));
    }
}
