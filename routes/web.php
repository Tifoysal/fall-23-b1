<?php

use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CustomerController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Frontend\SslCommerzPaymentController as FrontendSslCommerzPaymentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SslCommerzPaymentController;
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

Route::group(['middleware'=>'locale'],function(){

Route::get('/', [FrontendHomeController::class, 'home'])->name('home');
Route::get('/change-lang/{locale}', [FrontendHomeController::class, 'changeLang'])->name('change.lang');
Route::get('/search-product',[FrontendHomeController::class,'search'])->name('product.search');

Route::get('/registration', [CustomerController::class, 'registration'])->name('customer.registration');
Route::post('/registration', [CustomerController::class, 'store'])->name('customer.store');

Route::get('/login', [CustomerController::class, 'login'])->name('customer.login');
Route::post('/login', [CustomerController::class, 'doLogin'])->name('customer.do.login');

Route::get('/single-product/{id}', [FrontendProductController::class, 'singleProductView'])->name('single.product');

Route::get('/product-under-cagtegory/{cat_id}',[FrontendHomeController::class,'productsUnderCategory'])->name('products.under.category');


//cart routes here
Route::get('/cart-view',[CartController::class,'viewCart'])->name('cart.view');
Route::get('/add-to-cart/{product_id}',[CartController::class,'addToCart'])->name('add.toCart');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', [CustomerController::class, 'profile'])->name('profile.view');
    Route::get('/logout', [CustomerController::class, 'logout'])->name('customer.logout');
    Route::get('/checkout',[CartController::class,'checkout'])->name('checkout');

    Route::post('/order-place',[OrderController::class, 'orderPlace'])->name('order.place');

    // SSLCOMMERZ Start
    Route::get('/example1', [FrontendSslCommerzPaymentController::class, 'exampleEasyCheckout']);
    Route::get('/example2', [FrontendSslCommerzPaymentController::class, 'exampleHostedCheckout']);

    Route::post('/pay', [FrontendSslCommerzPaymentController::class, 'index']);
    Route::post('/pay-via-ajax', [FrontendSslCommerzPaymentController::class, 'payViaAjax']);

    Route::post('/success', [FrontendSslCommerzPaymentController::class, 'success']);
    Route::post('/fail', [FrontendSslCommerzPaymentController::class, 'fail']);
    Route::post('/cancel', [FrontendSslCommerzPaymentController::class, 'cancel']);

    Route::post('/ipn', [FrontendSslCommerzPaymentController::class, 'ipn']);
    //SSLCOMMERZ END


    Route::get('/buy-now/{product_id}',[OrderController::class,'buyNow'])->name('buy.now');
    Route::get('/cancel-order/{product_id}',[OrderController::class,'cancelOrder'])->name('order.cancel');
});


//all admin panel routes

Route::group(['prefix' => 'admin'], function () {

    Route::get('/login', [UserController::class, 'loginForm'])->name('admin.login');

    Route::post('/login-form-post', [UserController::class, 'loginPost'])->name('admin.login.post');


    Route::group(['middleware' => 'auth'], function () {

        Route::group(['middleware' => 'checkAdmin'], function () {

            Route::get('/logout', [UserController::class, 'logout'])->name('admin.logout');
            Route::get('/', [HomeController::class, 'home'])->name('dashboard');

            Route::get('/users', [UserController::class, 'list'])->name('users.list');

            Route::get('/users/create', [UserController::class, 'createForm'])->name('users.create');

            Route::post('/users/store', [UserController::class, 'store'])->name('users.store');

            Route::get('/category/list', [CategoryController::class, 'list'])->name('category.list');

            Route::get('/brand/list', [BrandController::class, 'list'])->name('brand.list');

            Route::get('/category/form', [CategoryController::class, 'createForm'])->name('category.form');

            Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');

            Route::get('/brand/create', [BrandController::class, 'createForm'])->name('brand.create');

            Route::post('/brand/store', [BrandController::class, 'store'])->name('brand.store');


            Route::get('/product/list', [ProductController::class, 'list'])->name('product.list');

            Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

            Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');

            Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');

            Route::get('/product/create', [ProductController::class, 'createForm'])->name('product.create');

            Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

            //roles
            Route::group(['prefix'=>'roles','as'=>'roles.'],function(){
                Route::get('/list', [RoleController::class, 'list'])->name('list');
                Route::get('/form', [RoleController::class, 'createForm'])->name('form');
                Route::post('/store', [RoleController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('edit');
                Route::post('/edit/{id}', [RoleController::class, 'update'])->name('edit');
                Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('delete');
            }); 
           


        });

    });
});
});


