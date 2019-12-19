<?php

namespace App\Http\Controllers\API;

use App\CartItem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function store()
    {
        // TODO - Validation

        $item = new CartItem;
        $item->product_id = request('product_id');
        $item->customer_name = request('customer_name');

        $item->quantity = request('quantity') ?: 1;

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
