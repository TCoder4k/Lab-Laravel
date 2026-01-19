<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('hello');
});

Route::fallback(function(){
    return view('error.404');
});
Route::prefix('product')->group(function () {

Route::get('/', function () {
    return view('product.index');
})->name('index');
Route::get('/add', function () {
    return view('product.add');
})->name('add');
Route::get('/{id?}', function (string $id="123") {
    return view('product.detail', ['id' => $id]);
});
});
Route::get('/sinhvien/{name?}/{mssv?}', function (string $name = "Luong Xuan Hieu",string  $mssv = "123456") {
    return view('sinhvien.index', ['name' => $name , 'mssv' => $mssv]);
});
Route::get('/banco/{n}', function($n){
    return view('banco.index',['n' => $n]);
});

