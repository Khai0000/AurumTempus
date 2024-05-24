<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WatchController;
use App\Models\Blog;
use App\Models\Message;
use App\Models\Watch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Home route
Route::get('/', function () {
    if (Auth::check()) {
        $watches = Watch::take(6)->get();
        $blogs = Blog::take(3)->get();
        return view('home', ['watches' => $watches, 'blogs' => $blogs]);
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
    $watch = Watch::with(['comments' => function ($query) {
        $query->orderBy('created_at', 'desc');
    }])->findOrFail($id);
    return view('productDetails', ['watch' => $watch]);
});

Route::get('/products/{id}/edit', function ($id) {
    $watch = Watch::findOrFail($id);
    return view('edit', ['watch' => $watch]);
});

Route::delete('/products/{id}/delete', [WatchController::class, 'destroy']);

Route::put('/products/{id}/edit', [WatchController::class, 'update']);

Route::post('/products/{id}/create/review', [CommentController::class, 'create']);

Route::post('/products/{watchId}/delete/{commentId}', [CommentController::class, 'destroy']);


// Blogs CRUD routes
Route::get('/blog', function () {
    $blogs = Blog::all();
    return view('blog', ['blogs' => $blogs]);
});

Route::get('/blog/{id}', function ($id) {
    $blog = Blog::findOrFail($id);
    return view('blogDetails', ['blog' => $blog]);
});

Route::get('/blog/{id}/edit', function ($id) {
    $blog = Blog::findOrFail($id);
    return view('editBlog', ['blog' => $blog]);
});

Route::get('/upload/blog', function () {
    return view('uploadBlog');
});

Route::post('/create/blog', [BlogController::class, 'create']);

Route::delete('/blog/{id}/delete', [BlogController::class, 'destroy']);

Route::put('/blog/{id}/edit', [BlogController::class, 'update']);


// Contact routes
Route::get('/contactUs', function () {
    $messages = Message::all();
    return view('contactUs', ['messages' => $messages]);
});

Route::post('/contactUs/create/message', [MessageController::class, 'store']);

Route::post('/contactUs/{id}/delete/message', [MessageController::class, 'delete']);

// Profile routes
Route::get('/profile', function () {
    return view('profile');
});

Route::post('/profile/edit', [UserController::class, 'update']);


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
