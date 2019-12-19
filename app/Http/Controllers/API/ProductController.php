<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category');

        $products->when(request('price_more_than'), function($q) {
            $q->where('price', '>', request('price_more_than'));
        });

        $products->when(request('price_less_than'), function($q) {
            $q->where('price', '<', request('price_less_than'));
        });

        $products->when(request('name'), function($q) {
            $requestedName = request('name');
            $q->where('name', 'LIKE', "%{$requestedName}%");
        });

        $products->when(request('category_id'), function($q) {
            $q->where('category_id', request('category_id'));
        });

        return response()->json($products->paginate(8));
    }

    public function show($id)
    {
        return response()->json(Product::with('category')->find($id));
    }
}
