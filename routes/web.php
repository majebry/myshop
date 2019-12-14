<?php

Route::get('/', function() {
    return redirect('/products');
});

Route::get('/products', 'ProductController@index'); // List all products
Route::get('/products/create', 'ProductController@create')->middleware('auth'); // Show form to add new product
Route::post('/products', 'ProductController@store')->middleware('auth'); // Store the product in database
Route::get('/products/{id}', 'ProductController@show'); // Show one product

Route::get('/categories/create', 'CategoryController@create')->middleware('auth'); // Show form to add new category
Route::post('/categories', 'CategoryController@store')->middleware('auth'); // Store the submitted category in database

Auth::routes(); // disable register option

Route::get('/home', 'HomeController@index')->name('home');
