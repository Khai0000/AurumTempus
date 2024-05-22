<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\WatchController;
use App\Models\Watch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        $watches = Watch::take(6)->get();
        return view('home', ['watches' => $watches]);
    } else {
        return view('login');
    }
});

Route::get('/products', function () {
    $watches = Watch::paginate(6);
    return view('product', ['watches' => $watches]);
});

Route::get('/products/{id}', function ($id) {
    $watch = Watch::findOrFail($id); 
    return view('productDetails',['watch'=>$watch]);
});

Route::get('/upload/product', function () {
    return view('upload');
});

Route::post('/upload/product', [WatchController::class, 'store']);


Route::get('/blog', function () {
    return view('blog');
});

Route::get('/contactUs', function () {
    return view('contactUs');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/signup', function () {
    return view('signup');
});

Route::post('/signup', [UserController::class, 'register']);

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [UserController::class, 'login']);

Route::post('/logout', [UserController::class, 'logout']);
