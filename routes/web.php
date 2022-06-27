<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::match(['get','post'],'/',[\App\Http\Controllers\UserController::class,'signup']);
Route::match(['get','post'],'/login',[\App\Http\Controllers\UserController::class,'login']);
Route::match(['get','post'],'/admin/dashboard',[\App\Http\Controllers\UserController::class,'dashboard']);
Route::get('/user/profile',[\App\Http\Controllers\UserController::class,'profile']);
Route::get('/admin/logout',[\App\Http\Controllers\UserController::class,'adminLogout']);
Route::get('/user/logout',[\App\Http\Controllers\UserController::class,'userLogout']);
Route::match(['get','post'],'/product/edit/{id}',[\App\Http\Controllers\ProductController::class,'edit']);
Route::get("/product/delete/{id}",[\App\Http\Controllers\ProductController::class,'delete']);
