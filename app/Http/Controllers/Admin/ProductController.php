<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index', [
            'products' => Product::all()
        ]);
    }

    public function create()
    {
        return view('admin.products.create', [
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

        return redirect('admin/products');
    }

    public function edit($id)
    {
        return view('admin.products.edit',  [
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

        return redirect('admin/products');
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

        return redirect('admin/products');
    }
}
