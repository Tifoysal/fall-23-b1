<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//all products 
Route::get('/all/products',[ProductController::class,'allProducts']);

//single product
Route::get('/single/product/{id}',[ProductController::class,'singleProduct']);

//customer registration
Route::post('/customer/registration',[ProductController::class, 'registration']);