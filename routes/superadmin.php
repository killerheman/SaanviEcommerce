<?php

use Illuminate\Support\Facades\Route;

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


    Route::get('/', function () {
        return view('admin.dashboard');
    });
    // Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'showDashboard']);
    // Route::get('/settings', [\App\Http\Controllers\AdminController::class, 'showSettings']);
