<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Order;

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
        $latest_products = Product::OrderByDesc('created_at')->limit(10)->get();

        return view('index', compact('latest_products'));
    }

    public function dashboard()
    {
        $top_orders = Order::orderByDesc('total_amount')->get();

        $top_products = DB::table('items')
            ->select('product_id', DB::raw('COUNT(product_id) as order_count'))
            ->groupBy('product_id')
            ->orderByDesc('order_count')
            ->take(10)
            ->get();

        $product_ids = $top_products->pluck('product_id');
        $products = Product::whereIn('id', $product_ids)->get();

        $products = $products->map(function ($product) use ($top_products) {
            $product->order_count = $top_products->firstWhere('product_id', $product->id)->order_count;
            return $product;
        });

        return view('dashboard.home.index', compact('top_orders', 'products'));
    }
    public function product($id)
    {
        $product = Product::findOrFail($id);

        return view('product', compact('product'));
    }
    public function products(Request $request, $cat = null)
    {
        // return $request;
        $query = Product::query();

        if ($cat) {
            $category = Category::whereName($cat)->first();
            $query->where('category_id', $category->id);
        }

        // Filter by products per page
        $perPage = $request->input('per_page', 8);

        // Filter by condition
        if ($request->has('condition')) {
            $query->whereIn('condition', $request->input('condition'));
        }

        // Filter by price range
        if ($request->has('min_price') && $request->has('max_price')) {
            $query->whereBetween('price', [$request->input('min_price'), $request->input('max_price')]);
        }

        $products = $query->orderByDesc('id')->paginate($perPage);

        return view('products', compact('products'));
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
