<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        return view('home');
    }

    public function home()
    {
        return redirect('customer/products');
    }
}
