<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $query = Product::with(['store', 'productCategory', 'productImages']);

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->category) {
            $query->where('product_category_id', $request->category);
        }

        if ($request->min_price && $request->max_price) {
            $query->whereBetween('price', [
                $request->min_price,
                $request->max_price
            ]);
        }

        $products = $query->latest()->paginate(12);

        $categories = ProductCategory::all();

        return view('products.index', compact('products', 'categories'));
    }

    public function show($value)
    {
        $product = Product::with([
            'store',
            'productCategory',
            'productImages',
            'productReviews' 
        ])
        ->where('slug', $value)
        ->orWhere('id', $value)
        ->firstOrFail();

        $related = Product::with('productImages')
            ->where('product_category_id', $product->product_category_id)
            ->where('id', '!=', $product->id)
            ->take(8)
            ->get();

        $rating = $product->productReviews->avg('rating') ?? null;
        $rating = $rating ? round($rating, 1) : null;

        $sold = $product->transactionDetails->sum('quantity') ?? 0;

        $shippingEstimate = [
            'min' => 15000,
            'max' => 25000,
            'from' => optional($product->store)->city ?? 'Unknown'
        ];

        return view('products.show', compact('product', 'related', 'rating', 'sold', 'shippingEstimate'));
    }
}
