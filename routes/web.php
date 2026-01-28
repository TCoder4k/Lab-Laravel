<?php

use App\Http\Controllers\AgeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestController;
use App\Http\Middleware\CheckTimeAccess;
use Illuminate\Support\Facades\Route;

// Age verification routes (without middleware)
Route::get('/age-input', [AgeController::class, 'showForm'])->name('age.form')->withoutMiddleware([\App\Http\Middleware\CheckAge::class]);
Route::post('/age-input', [AgeController::class, 'store'])->name('age.store')->withoutMiddleware([\App\Http\Middleware\CheckAge::class]);

Route::get('/', function () {
    return view('hello');
});
Route::get('/user/login', function () {
    return view('user.login');
})->name('login');
Route::get('/user/register', function () {
    return view('user.register');
})->name('register');

Route::fallback(function(){
    return view('error.404');
});
Route::prefix('product')->group(function () {

Route::controller(ProductController::class)-> group(function(){
    Route::get('/', 'index')-> name('index');
    Route::get('/detail/{id?}', 'getDetail')->name('detail');
    Route::get('/add', 'create')->name('add');
    // Route::Post('/edit/{id}', 'edit')->name('edit');
    Route::Post('/store', 'store')->name('store');
});


});

Route::controller(AuthController::class)->group(function(){
    Route::Post('/checkLogin', 'checkLogin')->name('checkLogin')->name('login');
    Route::Post('/checkRegister', 'checkRegister')->name('checkRegister')->name('register');
    Route::get('/signin', 'signIn')->name('signIn');
    Route::post('/checkSignIn', 'checkSignIn')->name('checkSignIn');
});

Route::get('/sinhvien/{name?}/{mssv?}', function (string $name = "Luong Xuan Hieu",string  $mssv = "123456") {
    return view('sinhvien.index', ['name' => $name , 'mssv' => $mssv]);
});
Route::get('/banco/{n}', function($n){
    return view('banco.index',['n' => $n]);
});
Route::resource('test', TestController::class);;

