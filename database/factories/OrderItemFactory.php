<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrderItem;
use Faker\Generator as Faker;

$factory->define(OrderItem::class, function (Faker $faker) {
    $product = Product::all()->random();
    return [
        'order_id' => Order::inRandomOrder()->first()->id,
        'product_id' => $product->id,
        'quantity' => rand(1, 5),
        'sold_price' => $product->price,
    ];
});
