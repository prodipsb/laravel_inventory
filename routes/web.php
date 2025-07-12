<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', function () {
    $page = request('page', 'products');
    return view('home', compact('page'));
})->name('home');



Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);
