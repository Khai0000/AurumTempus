<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/products', function () {
    return view('product');
});

Route::get('/products/{id}', function ($id) {
    return view('productDetails');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/contactUs', function () {
    return view('contactUs');
});

Route::get('/profile', function () {
    return view('profile');
});
