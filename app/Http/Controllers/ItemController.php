<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        // $item->delete();
        $cart = auth()->user()->cart;

        $items_to_delete = $cart->items->where('product_id', $item->product_id);

        foreach ($items_to_delete as $value) {
            $cart->total_amount -= $value->product->price;
            $cart->save();
            
            $value->delete();
        }

        return redirect()->back();
    }

    public function add_to_cart($product_id)
    {

        $order = null;
        if (count(auth()->user()->orders->where('status', 'cart')) > 0) {
            $order = auth()->user()->orders->where('status', 'cart')->first();
        } else {
            $order = Order::create([
                'customer_id' => auth()->id(),
                'date' => Carbon::now(),
                'serial' => Order::max('serial') ? Order::max('serial') + 1 : 100000
            ]);
        }

        $item = Item::create([
            'order_id' => $order->id,
            'product_id' => $product_id
        ]);

        $order->total_amount += $item?->product?->price;
        $order->save();

        return redirect()->back();
    }
}
