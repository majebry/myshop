<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Product;
use Illuminate\Http\Request;

class ProductRatingController extends Controller
{
    public function store($product_id)
    {
        $product = Product::find($product_id);

        $rating = new \willvincent\Rateable\Rating;
        $rating->customer_id = Customer::first()->id;
        $rating->rating = request('rating');

        $product->ratings()->save($rating);

        return response()->json(['average' => $product->averageRating]);
    }
}
