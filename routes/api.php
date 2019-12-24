<?php

Route::get('/categories', 'API\CategoryController@index');

Route::get('/products', 'API\ProductController@index');
Route::get('/products/{id}', 'API\ProductController@show');

// middleware : auth:api
Route::post('/customer/cart-items', 'API\Customer\CartItemController@store')->middleware('auth:api');
Route::patch('/customer/cart-items/{cart_item}', 'API\Customer\CartItemController@update')->middleware('auth:api');
Route::delete('/customer/cart-items/{cart_item}', 'API\Customer\CartItemController@destroy')->middleware('auth:api');

Route::get('/customer/cart', 'API\Customer\CartController@index');

Route::post('/customer/cart/checkout', 'API\Customer\CartController@checkout');

Route::post('customer/auth/register', 'API\Customer\AuthController@register');
Route::post('customer/auth/login', 'API\Customer\AuthController@login');
Route::post('customer/auth/logout', 'API\Customer\AuthController@logout')->middleware('auth:api');
Route::get('customer/auth/me', 'API\Customer\AuthController@me')->middleware('auth:api');
