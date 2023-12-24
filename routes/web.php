<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/',[ProductController::class,'products'])->name('products');
Route::get('add-product',[ProductController::class,'addProduct'])->name('addProduct');
Route::get('alter-product/{id}',[ProductController::class,'alterProduct'])->name('alterProduct');
