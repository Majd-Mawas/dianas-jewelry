<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use App\Models\Order;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shippings = Shipping::all();
        $orders = Order::whereNull('shipping_id')->whereStatus('orderd')->get();

        return view('dashboard.shipping.index', compact('shippings', 'orders'));
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
        $input = $request->all();

        $order = Order::findOrFail($input['order']);
        unset($input['order']);

        $shipping = Shipping::create($input);

        $order->shipping_id = $shipping->id;
        $order->status = 'shipped';

        $order->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Shipping $shipping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shipping $shipping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shipping $shipping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shipping $shipping)
    {
        //
    }

    public function confirm($id)
    {
        $shipping = Shipping::findOrFail($id);
        $shipping->is_delivered = true;
        $shipping->save();

        $order = $shipping->order;
        $order->status = 'delivered';
        $order->save();

        return redirect()->back();
    }
}
