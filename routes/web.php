<?php

use App\Http\Controllers\AgeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Age verification routes (without middleware)
// Route::get('/age-input', [AgeController::class, 'showForm'])->name('age.form')->withoutMiddleware([\App\Http\Middleware\CheckAge::class]);
// Route::post('/age-input', [AgeController::class, 'store'])->name('age.store')->withoutMiddleware([\App\Http\Middleware\CheckAge::class]);

// Client routes
Route::controller(ClientController::class)->group(function () {
    Route::get('/', 'home')->name('client.home');
    Route::get('/store', 'store')->name('client.store');
    Route::get('/product/{id}', 'product')->name('client.product');
    Route::get('/checkout', 'checkout')->name('client.checkout');
});

Route::get('/admin', function () {
    return view('layouts.admin');
});

// Product routes 
Route::prefix('admin/product')->group(function () {

Route::controller(ProductController::class)-> group(function(){
    Route::get('/', 'index')-> name('index');
    Route::get('/detail/{id?}', 'getDetail')->name('detail');
    Route::get('/add', 'create')->name('add');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/update/{id}', 'update')->name('update');
    Route::get('/delete/{id}', 'destroy')->name('delete');
});


});

// Category routes
Route::resource('admin/categories', CategoryController::class)->names('categories');

// Auth routes
Route::controller(AuthController::class)->group(function(){
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/checkLogin', 'checkLogin')->name('checkLogin');
});

//Student routes
Route::get('/sinhvien/{name?}/{mssv?}', function (string $name = "Luong Xuan Hieu",string  $mssv = "123456") {
    return view('sinhvien.index', ['name' => $name , 'mssv' => $mssv]);
});

//Chess routes
Route::get('/banco/{n}', function($n){
    return view('banco.index',['n' => $n]);
});

// Fallback must be at the end
Route::fallback(function(){
    return view('error.404');
});

