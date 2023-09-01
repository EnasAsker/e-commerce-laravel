<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [ProductController::class, 'index'])->name('index');
Route::get('/search', [ProductController::class, 'search']);
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/shop', [ProductController::class, 'allProducts']);

Route::view('/register', 'register');

Route::get('/logout', function(){
    $session = Session::getFacadeRoot();
    $session->forget('user');
    return redirect ('login');
});

Route::get('/login', function(){
    return view ('login');
});


Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

Route::get('/profile', function(){
    return view('profile');
});
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::post('/cart', [ProductController::class, 'addToCart']);
Route::get('/cartItems', [ProductController::class, 'cartItems']);
Route::get('/order', [ProductController::class, 'order']);
Route::post('/orderPlace', [ProductController::class, 'orderPlace']);
Route::get('/myOrders', [ProductController::class, 'myOrders']);
