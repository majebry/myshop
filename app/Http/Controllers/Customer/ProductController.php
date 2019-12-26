<?php

namespace App\Http\Controllers\Customer;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest(); // Product::query()

        // if the user requested products for a specific category
        // just return for them products for that category

        $products->when(request('category_id'), function($q) {
            $q->where('category_id', request('category_id'));
        });

        return view('customer.products.index', [
            'products' => $products->paginate(8),
            'categories' => Category::all()
        ]);
    }

    public function show($id)
    {
        return view('customer.products.show', [
            'product' => Product::with('category')->find($id)
        ]);
    }
}
