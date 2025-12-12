<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use App\Models\Product;
use App\Models\Order;
use App\Models\Withdrawal;
use App\Models\SellerWithdrawal;
use App\Models\SellerBalance;

class SellerController extends Controller
{
    // ================= PROFIL =================
    public function edit(Request $request): View
    {
        return view('seller.edit', [
            'seller' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('seller.edit')->with('status', 'profile-updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();
        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    // ================= DASHBOARD =================
    public function dashboard()
    {
        return view('seller.dashboard');
    }

    // ================= BALANCE =================
    public function balance()
    {
        $balance = SellerBalance::where('user_id', auth()->id())->first();
        $balanceAmount = $balance ? $balance->amount : 0;

        return view('seller.balance.index', compact('balanceAmount'));
    }

    // ================= PRODUCTS =================
    public function createProduct()
    {
        $categories = \App\Models\Category::all(); // ambil kategori untuk dropdown
        return view('seller.products.create', compact('categories'));
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        \App\Models\Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'seller_id' => auth()->id(),
            'stock' => $request->stock,
            'description' => $request->description,
        ]);

        return redirect()->route('seller.products.index')->with('success', 'Product added successfully!');
    }

    // ================= WITHDRAWALS =================
    public function withdrawals()
    {
        $withdrawals = SellerWithdrawal::where('seller_id', auth()->id())->get();
        return view('seller.withdrawals.index', compact('withdrawals'));
    }

    // ================= ORDERS =================
    public function orders()
    {
        $orders = Order::whereHas('product', function($q){
            $q->where('seller_id', auth()->id());
        })->get();
        return view('seller.orders.index', compact('orders'));
    }
}