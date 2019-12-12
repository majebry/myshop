<?php

Route::get('/products', 'ProductController@index'); // List all products
Route::get('/products/create', 'ProductController@create'); // Show form to add new product
Route::post('/products', 'ProductController@store'); // Store the product in database
Route::get('/products/{id}', 'ProductController@show'); // Show one product

Route::get('/categories/create', 'CategoryController@create'); // Show form to add new category
Route::post('/categories', 'CategoryController@store'); // Store the submitted category in database
