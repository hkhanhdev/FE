<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\Client\Home::class,"home"])->name('home');
Route::get('/all',[\App\Http\Controllers\Client\Home::class,"pagination"]);

Route::get('/sign_in',[\App\Http\Controllers\Client\Home::class,"toSignIn"])->name('sign_in');
Route::post('/sign_in',[\App\Http\Controllers\Auth\AuthenticateUser::class,"authenticate"]);

Route::get('/sign_up',[\App\Http\Controllers\Client\Home::class,"toSignUp"])->name('sign_up');
Route::post('/sign_up',[\App\Http\Controllers\Auth\Register::class,"registeringUser"]);

Route::get('/contact',[\App\Http\Controllers\Client\Home::class,"toContact"])->name('contact');

Route::get('/product',[\App\Http\Controllers\Client\Home::class,'productDetails']);

Route::get('/products',[\App\Http\Controllers\Client\Home::class,"productsByCate"]);

Route::get('/cart',function (){
    return view('pages.cart');
})->name('cart');

Route::get('/check_out',function (){
    return view('pages.check_out');
})->name('checkout');

Route::get('/order_history',function (){
    return view('pages.order_history');
})->name('order_history');

Route::get('/profile',function (){
    return view('pages.user_profile');
})->name('profile');

Route::fallback(function () {
    return view("pages.fallback");
});
