<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WatchController;
use App\Models\Message;
use App\Models\Watch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Home route
Route::get('/', function () {
    if (Auth::check()) {
        $watches = Watch::take(6)->get();
        return view('home', ['watches' => $watches]);
    } else {
        return view('login');
    }
});

// Products CRUD routes
Route::get('/upload/product', function () {
    return view('upload');
});

Route::post('/upload/product', [WatchController::class, 'store']);

Route::get('/products', function () {
    $watches = Watch::paginate(6);
    return view('product', ['watches' => $watches]);
});

Route::get('/products/{id}', function ($id) {
    $watch = Watch::findOrFail($id); 
    return view('productDetails',['watch'=>$watch]);
});

Route::get('/products/{id}/edit', function ($id) {
    $watch = Watch::findOrFail($id); 
    return view('edit',['watch'=>$watch]);
});

Route::delete('/products/{id}/delete', [WatchController::class,'destroy']);
Route::put('/products/{id}/edit', [WatchController::class, 'update']);


// Blogs CRUD routes
Route::get('/blog', function () {
    return view('blog');
});


// Contact routes
Route::get('/contactUs', function () {
    $messages = Message::all();
    return view('contactUs',['messages'=>$messages]);
});

Route::post('/contactUs/create/message', [MessageController::class,'store']);

Route::post('/contactUs/{id}/delete/message', [MessageController::class,'delete']);

// Profile routes
Route::get('/profile', function () {
    return view('profile');
});

Route::post('/profile/edit', [UserController::class,'update']);


// Authentication routes
Route::get('/signup', function () {
    return view('signup');
});

Route::post('/signup', [UserController::class, 'register']);

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [UserController::class, 'login']);

Route::post('/logout', [UserController::class, 'logout']);
