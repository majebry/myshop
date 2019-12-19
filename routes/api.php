<?php

Route::get('/categories', 'API\CategoryController@index');

Route::get('/products', 'API\ProductController@index');
Route::get('/products/{id}', 'API\ProductController@show');

Route::post('/cart-items', 'API\CartItemController@store');
Route::patch('/cart-items/{cart_item}', 'API\CartItemController@update');
Route::delete('/cart-items/{cart_item}', 'API\CartItemController@destroy');

Route::get('/my-cart/{customer}', function ($customer) {
    $customerItems = \App\CartItem::where('customer_name', $customer);

    return [
        'items' => $customerItems->with('product')->get(),
        // 'total_price' => $customerItems->products()->sum('price')
    ];
});
