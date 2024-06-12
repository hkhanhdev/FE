<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\Client\Home::class,"home"])->name('home');
Route::get('/all',[\App\Http\Controllers\Client\Home::class,"pagination"]);

Route::get('/sign_in',[\App\Http\Controllers\Client\Home::class,"toSignIn"])->name('sign_in');
Route::post('/sign_in',[\App\Http\Controllers\Auth\AuthenticateUser::class,"authenticate"])->middleware(['authenticated']);

Route::get('/sign_up',[\App\Http\Controllers\Client\Home::class,"toSignUp"])->name('sign_up');
Route::post('/sign_up',[\App\Http\Controllers\Auth\Register::class,"registeringUser"]);

Route::get('/contact',[\App\Http\Controllers\Client\Home::class,"toContact"])->name('contact');

Route::get('/product',[\App\Http\Controllers\Client\Home::class,'productDetails']);

Route::get('/products',[\App\Http\Controllers\Client\Home::class,"productsByCate"]);

Route::get('/cart',[\App\Http\Controllers\Client\Cart::class,"render_cart"])->name('cart')->middleware(['authenticated']);
Route::put('/cart',[\App\Http\Controllers\Client\Cart::class,"update_cart"])->middleware(['authenticated']);
Route::delete('/cart',[\App\Http\Controllers\Client\Cart::class,"remove_item"])->middleware(['authenticated']);
Route::post('/cart',[\App\Http\Controllers\Client\Cart::class,"to_check_out"])->middleware(['authenticated']);
Route::get('/check_out',function (){
    return view('pages.check_out');
})->name('checkout')->middleware(['authenticated']);
Route::post('/check_out',[\App\Http\Controllers\Client\Cart::class,"cf_check_out"])->middleware(['authenticated']);

Route::get('/order_history',[\App\Http\Controllers\Client\Home::class,'order_history'])->name('order_history')->middleware(['authenticated']);

Route::get('/profile',[\App\Http\Controllers\Client\Home::class,'profile'])->name('profile')->middleware(['authenticated']);
Route::post('/profile',[\App\Http\Controllers\Client\Home::class,'updateInfo'])->middleware(['authenticated']);

Route::get('/logout',[\App\Http\Controllers\Client\Home::class,"logout"])->middleware(['authenticated']);

Route::fallback(function () {
    return view("pages.fallback");
});
