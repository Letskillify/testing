<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with(['user', 'orderItems.product', 'shippingMethod', 'paymentType', 'coupon'])->get();
        return response()->json($orders);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'total' => 'required|numeric|min:0',
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled,refunded',
            'shipping_address' => 'required|array',
            'billing_address' => 'required|array',
            'order_items' => 'required|array',
            'order_items.*.product_id' => 'required|exists:products,id',
            'order_items.*.quantity' => 'required|integer|min:1',
            'shipping_method_id' => 'nullable|exists:shipping_methods,id',
            'payment_type_id' => 'nullable|exists:payment_types,id',
            'coupon_id' => 'nullable|exists:coupons,id'
        ]);

        $order = Order::create($request->except('order_items'));

        foreach ($request->order_items as $item) {
            $order->orderItems()->create([
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => Product::find($item['product_id'])->price, //store price
            ]);
        }
        $order->load('orderItems.product');
        return response()->json($order, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order->load(['user', 'orderItems.product', 'shippingMethod', 'paymentType', 'coupon']);
        return response()->json($order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'total' => 'required|numeric|min:0',
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled,refunded',
            'shipping_address' => 'required|array',
            'billing_address' => 'required|array',
            'shipping_method_id' => 'nullable|exists:shipping_methods,id',
            'payment_type_id' => 'nullable|exists:payment_types,id',
            'coupon_id' => 'nullable|exists:coupons,id'
        ]);

        $order->update($request->all());
        return response()->json($order);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json(null, 204);
    }
}
