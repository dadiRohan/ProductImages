<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductAPIController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('index',[ProductAPIController::class,'index'])->name('index');
Route::post('store',[ProductAPIController::class,'store'])->name('store');
Route::get('edit/{id}',[ProductAPIController::class,'edit'])->name('edit');
Route::post('update',[ProductAPIController::class,'update'])->name('update');
Route::get('delete/{id}',[ProductAPIController::class,'delete'])->name('delete');