<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::query();

        if (request('customer_name')) {
            $orders->whereHas('customer', function($q) {
                $q->where('name', 'LIKE', '%' . request('customer_name') . '%');
            });
        }

        if (request('created_after')) {
            $orders->whereDate('created_at', '>=', request('created_after'));
        }

        if (request('created_before')) {
            $orders->whereDate('created_at', '<=', request('created_before'));
        }

        return view('admin.orders.index', [
            'orders' => $orders->get()
        ]);
    }

    public function show($id)
    {
        return view('admin.orders.show', [
            'order' =>  Order::with('order_items')->find($id)
        ]);
    }
}
