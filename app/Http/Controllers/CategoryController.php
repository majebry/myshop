<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('categories.create');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|unique:categories'
        ]);

        $category = new Category;
        $category->name = request('name');
        $category->save();

        return redirect('/products');
    }
}
