<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\AdminController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/


    Route::get('/', [AdminController::class, 'dashboard']);
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    
    // Route::get('category/{id}', CategoryController::class, 'delete')->name('category.delete');
    // Route::delete('cities/{id}', [App\Http\Controllers\CityController::class, 'delete'])->name('cities.delete');

