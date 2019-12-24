<?php

namespace App\Http\Controllers\API\Customer;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $customer = auth('api')->user();

        return response()->json([
            'items' => $customer->cart_items,
            'total_price' => $customer->cart_products()->sum(\DB::raw('products.price * cart_items.quantity'))
        ]);
    }

    public function checkout()
    {
        $customer = auth('api')->user();

        // instantiate new order
        $order = new Order;
        $order->customer_id = $customer->id;
        $order->save();

        // move cart items to be order items
        foreach ($customer->cart_items as $cartItem) {
            $orderItem = new OrderItem;
            $orderItem->product_id = $cartItem->product_id;
            $orderItem->quantity = $cartItem->quantity;
            $orderItem->sold_price = $cartItem->product->price;

            $order->order_items()->save($orderItem);
        }

        // empty cart from items
        $customer->cart_items()->delete();

        return response()->json($order->load('order_items'));
    }
}
