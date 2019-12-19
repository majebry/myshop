<?php

Route::get('/categories', 'API\CategoryController@index');

Route::get('/products', 'API\ProductController@index');
Route::get('/products/{id}', 'API\ProductController@show');

// middleware : auth:api
Route::post('/cart-items', 'API\CartItemController@store');
Route::patch('/cart-items/{cart_item}', 'API\CartItemController@update');
Route::delete('/cart-items/{cart_item}', 'API\CartItemController@destroy');

// Route::get('/my-cart/{customer}', function ($customer) {
//     $customerItems = \App\CartItem::where('customer_name', $customer);

//     return [
//         'items' => $customerItems->with('product')->get(),
//         // 'total_price' => $customerItems->products()->sum('price')
//     ];
// });

Route::post('customer/auth/login', 'API\Customer\AuthController@login');
Route::post('customer/auth/logout', 'API\Customer\AuthController@logout')->middleware('auth:api');
Route::get('customer/auth/me', 'API\Customer\AuthController@me')->middleware('auth:api');
