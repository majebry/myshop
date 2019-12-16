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
            'products' => $products->paginate(8),
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
        request()->validate($this->rules());

        $imagePath = request()->file('image')->store('public');

        $product = new Product;
        $product->name = request('name');
        $product->price = request('price');
        $product->description = request('description');
        $product->image = $imagePath;

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

    public function edit($id)
    {
        return view('products.edit',  [
            'categories' => Category::all(),
            'product' => Product::find($id)
        ]);
    }

    public function update($id)
    {
        request()->validate($this->rules());

        $product = Product::find($id);

        if (request()->file('image')) {
            \Storage::delete($product->image);

            $newImagePath = request()->file('image')->store('public');

            $product->image = $newImagePath;
        }

        $product->name = request('name');
        $product->price = request('price');
        $product->description = request('description');
        $product->save();

        return redirect('/products');
    }

    private function rules()
    {
        return [
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|image',
            'category' => 'required|exists:categories,id'
        ];
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        \Storage::delete($product->image);

        $product->delete();

        return redirect('/products');
    }
}
