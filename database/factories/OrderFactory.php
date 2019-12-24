<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'customer_id' => Customer::all()->random()->id,
        'created_at' => $faker->dateTimeBetween('-30 days', '+30 days')
    ];
});
