<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function landing()
    {
        $latest_products = Product::OrderByDesc('created_at')->limit(5)->get();

        return view('index', compact('latest_products'));
    }

    public function dashboard()
    {
        return view('dashboard.home.index');
    }
    public function product($id)
    {
        $product = Product::findOrFail($id);

        return view('product', compact('product'));
    }
    public function products()
    {
        // $product = Product::findOrFail($id);

        return view('products');
    }

    public function cart()
    {
        $cart = auth()->user()->cart;

        if (isset($cart)) {
            // Step 1: Get the product IDs with their counts
            $productCounts = $cart->items()
                ->select('product_id', DB::raw('COUNT(*) as count'))
                ->groupBy('product_id')
                ->get()
                ->keyBy('product_id'); // Use keyBy to easily access the counts later

            // Step 2: Get the first item for each product_id with the product relationship
            $itemIds = $cart->items()
                ->select(DB::raw('MIN(id) as id'), 'product_id')
                ->groupBy('product_id')
                ->pluck('id');

            $items = $cart->items()
                ->with('product')
                ->whereIn('id', $itemIds)
                ->get();

            // Add the count to each item
            $items->each(function ($item) use ($productCounts) {
                $item->count = $productCounts[$item->product_id]->count;
            });
            return view('cart', compact('cart', 'items'));
        } else {
            to_route('/');
        }
    }
}
