<?php

namespace App\Http\Controllers\API\Customer;

use App\CartItem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function store()
    {
        request()->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer'
        ]);

        $customer = auth('api')->user();

        $cartItemQuery = $customer->cart_items()->where('product_id', request('product_id'));

        // if there is an item with the same productId in customer's cart
        if ($cartItemQuery->count()) {
            $item = $cartItemQuery->first();
            $item->quantity += request('quantity');
        } else { // if there isn't
            $item = new CartItem;
            $item->product_id = request('product_id');
            $item->customer_id = auth('api')->id();
            $item->quantity = request('quantity');
        }

        $item->save();

        return response()->json($item->refresh(), 201);
    }

    public function update($cart_item)
    {
        request()->validate([
            'quantity' => 'required'
        ]);

        $item = CartItem::find($cart_item);
        $item->quantity = request('quantity');
        $item->save();

        return response()->json($item->refresh());
    }

    public function destroy($cart_item)
    {
        CartItem::find($cart_item)->delete();

        return response()->json(null, 204);
    }
}
