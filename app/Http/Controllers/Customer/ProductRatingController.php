<?php

namespace App\Http\Controllers\Customer;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductRatingController extends Controller
{
    public function store($product_id)
    {
        $product = Product::find($product_id);

        $rating = new \willvincent\Rateable\Rating;
        $rating->customer_id = auth('web_customer')->id();
        $rating->rating = request('rating');

        $product->ratings()->save($rating);

        return response()->json(['average' => $product->averageRating]);
    }
}
