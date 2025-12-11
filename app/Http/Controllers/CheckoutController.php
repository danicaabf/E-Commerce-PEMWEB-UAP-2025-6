<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;   
use App\Models\Product;
use App\Models\Transaction;

class CheckoutController extends Controller
{
    public function index($id)
    {
        $product = Product::with(['productImages', 'productCategory', 'store'])->findOrFail($id);
        return view('checkout.index', compact('product'));
    }

    public function process(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        Transaction::create([
            'buyer_id'      => Auth::id(),          
            'store_id'      => $product->store_id,
            'code'          => 'TRX-' . time(),
            'address'       => '-',
            'address_id'    => 1,
            'city'          => '-',
            'postal_code'   => '00000',
            'shipping'      => 'standard',
            'shipping_type' => 'regular',
            'shipping_cost' => 0,
            'tax'           => 0,
            'grand_total'   => $product->price,
            'payment_status'=> 'paid'
        ]);

        return redirect()->route('orders.index')
                         ->with('success', 'Checkout berhasil!');
    }
}
