<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'home']);

Route::get('/category/list',[CategoryController::class,'list'])->name('category.list');

Route::get('/brand/list',[BrandController::class,'list']);

Route::get('/category/form',[CategoryController::class,'createForm']);

Route::post('/category/store',[CategoryController::class, 'store'])->name('category.store');

Route::get('/brand/create',[BrandController::class,'createForm'])->name('brand.create');

Route::post('/brand/store',[BrandController::class, 'store'])->name('brand.store');