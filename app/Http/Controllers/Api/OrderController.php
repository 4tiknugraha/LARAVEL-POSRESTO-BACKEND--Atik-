<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    // save order
    public function saveOrder(Request $request)
    {
        $request->validate([
            'payment_amount' =>'required',
            'sub_total' =>'required',
            'tax' =>'required',
            'discount' =>'required',
            'services_charge' =>'required',
            'total' =>'required',
            'payment_method' =>'required',
            'total_items' =>'required',
            'id_kasir' =>'required',
            'nama_kasir' =>'required',
            'transaction_time' =>'required',
            // 'order_items' =>'required'
        ]);
        //create order
        $order = Order::create([
            'payment_amount' => $request->payment_amount,
            'sub_total' => $request->sub_total,
            'tax' => $request->tax,
            'discount' => $request->discount,
            'services_charge' => $request->services_charge,
            'total' => $request->total,
            'payment_method' => $request->payment_method,
            'total_items' => $request->total_items,
            'id_kasir' => $request->id_kasir,
            'nama_kasir' => $request->nama_kasir,
            'transaction_time' => $request->transaction_time,
        ]);
        //create order items
        foreach ($request->order_items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id_product'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }
        return response()->json([
            'status' => 'success',
            'data' => $order
        ],200);


    }
}
