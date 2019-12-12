<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();

        return view('products.index', [
            'products' => $products,
            'categories' => Category::all()
        ]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store()
    {
        $product = new Product;
        $product->name = request('name');
        $product->price = request('price');
        $product->description = request('description');
        $product->save();

        return redirect('/products');
    }
}
