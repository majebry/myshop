<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::all()
        ]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|unique:categories'
        ]);

        $category = new Category;
        $category->name = request('name');
        $category->save();

        return redirect('admin/categories');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();

        return redirect('admin/categories');
    }
}
