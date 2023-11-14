<?php

use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\CustomerController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Models\Product;
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

//website's routes

Route::get('/',[FrontendHomeController::class, 'home'])->name('home');

Route::get('/registration',[CustomerController::class,'registration'])->name('customer.registration');
Route::post('/registration',[CustomerController::class, 'store'])->name('customer.store');

Route::get('/login',[CustomerController::class, 'login'])->name('customer.login');
Route::post('/login',[CustomerController::class,'doLogin'])->name('customer.do.login');

Route::get('/single-product/{id}',[FrontendProductController::class,'singleProductView'])->name('single.product');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/logout',[CustomerController::class, 'logout'])->name('customer.logout');
});


//all admin panel routes

Route::group(['prefix'=>'admin'],function(){

Route::get('/login', [UserController::class, 'loginForm'])->name('admin.login');

Route::post('/login-form-post', [UserController::class, 'loginPost'])->name('admin.login.post');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/logout',[UserController::class, 'logout'])->name('admin.logout');
    Route::get('/', [HomeController::class, 'home'])->name('dashboard');

    Route::get('/users',[UserController::class, 'list'])->name('users.list');
    Route::get('/users/create',[UserController::class, 'createForm'])->name('users.create');

    Route::post('/users/store',[UserController::class, 'store'])->name('users.store');

    Route::get('/category/list', [CategoryController::class, 'list'])->name('category.list');

    Route::get('/brand/list', [BrandController::class, 'list'])->name('brand.list');

    Route::get('/category/form', [CategoryController::class, 'createForm'])->name('category.form');

    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');

    Route::get('/brand/create', [BrandController::class, 'createForm'])->name('brand.create');

    Route::post('/brand/store', [BrandController::class, 'store'])->name('brand.store');


    Route::get('/product/list', [ProductController::class, 'list'])->name('product.list');

    Route::get('/product/create', [ProductController::class, 'createForm'])->name('product.create');

    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
});
});