<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Topup;
use App\Models\User;   
use Illuminate\Support\Str;


class TopupController extends Controller
{
    // Halaman Wallet (lihat saldo + riwayat topup)
    public function wallet()
    {
        return view('member.wallet', [
            'saldo'  => Auth::user()->saldo,
            'topups' => Topup::where('user_id', Auth::id())->latest()->get(),
        ]);
    }

    // Halaman form topup
    public function index()
    {
        return view('member.topup');
    }

    // Proses topup
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1000',
            'method' => 'required|in:ewallet,va,bank',
        ]);

        // Simpan data ke tabel topups
        $topup = Topup::create([
            'user_id'   => Auth::id(),
            'amount'    => $request->amount,
            'method'    => $request->method,
            'status'    => 'success',
            'reference' => 'TP-' . strtoupper(Str::random(8)),
        ]);

        // Tambahkan saldo user
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->saldo += $request->amount;
        $user->save();

        return back()->with('success', 'Topup berhasil! Saldo sudah bertambah.');
    }
}
