<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth',AdminMiddleware::class])->
group(function(){
    Route::get('/admin/dashboard',
    [AdminController::class,'index'])->name('admin.dasboard');
    Route::resource('brands',BrandController::class);
    Route::resource('categories',CategoryController::class);
    Route::resource('products',ProductController::class);
    Route::resource('orders',OrderController::class);
    Route::resource('coupons',CouponController::class);
});


Route::get('/shop',[ShopController::class,'index'])->name('shop');


//cart
Route::get('/cart',[CartController::class,'viewCart'])->
name('cart.view');

Route::post('/cart/add/{product}',[CartController::class,'addToCart'])->
name('cart.add');

Route::post('/cart/update',[CartController::class,'updateCart'])->
name('cart.update');

Route::post('/cart/remove/{id}',[CartController::class,'removeFromCart'])->
name('cart.remove');


//Update Category
Route::get('/categories/{id}/edit',[CategoryController::class,'edit'])->name('categories.edit');
Route::put('/categories/{id}',[CategoryController::class,'update'])->name('categories.update');



//Update Brand
Route::get('/brands/{id}/edit',[BrandController::class,'edit'])->name('brands.edit');
Route::put('/brands/{id}',[BrandController::class,'update'])->name('brands.update');

Route::get('cart.checkout',[OrderController::class,'checkout'])->name('checkout');
Route::post('/place-order',[OrderController::class,'placeOrder'])->name('place.order');

Route::get('/admin/dashboard',[DashboardController::class,'index']);


Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/orders', [OrderController::class, 'orderList'])->name('admin.orders');
    Route::post('/orders/update/{id}', [OrderController::class, 'updateOrderStatus'])->name('admin.orders.update');
});
