<?php

// Admin Routes
Route::get('admin/products', 'Admin\ProductController@index')->middleware('auth');
Route::get('admin/products/create',   'Admin\ProductController@create')->middleware('auth'); // Show form to add new product
Route::post('admin/products',         'Admin\ProductController@store')->middleware('auth'); // Store the product in database
Route::get('admin/products/{id}/edit','Admin\ProductController@edit')->middleware('auth'); // Show form to edit a specific existing product
Route::patch('admin/products/{id}',   'Admin\ProductController@update')->middleware('auth'); // update product details in database
Route::delete('admin/products/{id}',  'Admin\ProductController@destroy')->middleware('auth'); // delete a record from database

Route::get('admin/categories', 'Admin\CategoryController@index')->middleware('auth'); // Show form to add new category
Route::get('admin/categories/create', 'Admin\CategoryController@create')->middleware('auth'); // Show form to add new category
Route::post('admin/categories', 'Admin\CategoryController@store')->middleware('auth'); // Store the submitted category in database

Route::get('admin/orders', 'Admin\OrderController@index')->middleware('auth');
Route::get('admin/orders/{id}', 'Admin\OrderController@show')->middleware('auth');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@dashboard')->name('home');

// Customer Routes
Route::get('/customer/login', 'Customer\AuthController@showLoginForm');
Route::post('/customer/login', 'Customer\AuthController@login');
Route::post('/customer/logout', 'Customer\AuthController@logoutt');

Route::post('customer/products/{product_id}/ratings', 'Customer\ProductRatingController@store');

Route::get('/', 'HomeController@home');

Route::get('customer/products',          'Customer\ProductController@index'); // List all products
Route::get('customer/products/{id}',     'Customer\ProductController@show'); // Show one product
