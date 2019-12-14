<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;

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

        return view('products.index', [
            'products' => $products->get(),
            'categories' => Category::all()
        ]);
    }

    public function create()
    {
        return view('products.create', [
            'categories' => Category::all()
        ]);
    }

    public function store()
    {
        $product = new Product;
        $product->name = request('name');
        $product->price = request('price');
        $product->description = request('description');

        $category_id = request('category');
        Category::find($category_id)->products()->save($product);

        return redirect('/products');
    }

    public function show($id)
    {
        return view('products.show', [
            'product' => Product::with('category')->find($id)
        ]);
    }
}
