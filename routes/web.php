<?php

Route::get('/', 'HomeController@home');

Route::get('/products',          'ProductController@index'); // List all products
Route::get('/products/create',   'ProductController@create')->middleware('auth'); // Show form to add new product
Route::post('/products',         'ProductController@store')->middleware('auth'); // Store the product in database
Route::get('/products/{id}',     'ProductController@show'); // Show one product
Route::get('/products/{id}/edit','ProductController@edit')->middleware('auth'); // Show form to edit a specific existing product
Route::patch('/products/{id}',   'ProductController@update')->middleware('auth'); // update product details in database
Route::delete('/products/{id}',  'ProductController@destroy')->middleware('auth'); // delete a record from database

Route::get('/categories/create', 'CategoryController@create')->middleware('auth'); // Show form to add new category
Route::post('/categories', 'CategoryController@store')->middleware('auth'); // Store the submitted category in database

Route::get('/orders', 'OrderController@index');//->middleware('auth');
Route::get('/orders/{id}', 'OrderController@show');//->middleware('auth');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@dashboard')->name('home');

// Customer Routes
Route::get('/customer/login', 'Customer\AuthController@showLoginForm');
Route::post('/customer/login', 'Customer\AuthController@login');
Route::post('/customer/logout', 'Customer\AuthController@logoutt');

Route::post('products/{product_id}/ratings', 'ProductRatingController@store');
