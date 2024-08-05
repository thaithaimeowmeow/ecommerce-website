<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


//Home
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
Route::get('/all_products', [App\Http\Controllers\HomeController::class, 'allProducts'])->name('allProducts');


//Admin
Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'admin'], function () {

        Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'users'])->name('admin.users');

        Route::get('/admin/products', [App\Http\Controllers\AdminController::class, 'products'])->name('admin.products');
        Route::get('/admin/products/create', [App\Http\Controllers\ProductController::class, 'index'])->name('admin.add');
        Route::post('/admin/products/create', [App\Http\Controllers\ProductController::class, 'addProduct']);
        Route::get('/admin/products/edit/{product}', [App\Http\Controllers\ProductController::class, 'editProduct'])->name('product.edit');
        Route::patch('/admin/products/edit/{product}', [App\Http\Controllers\ProductController::class, 'updateProduct'])->name('product.update');
        Route::delete('/admin/products/edit/{product}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy');


        Route::get('/admin/carousels', [App\Http\Controllers\AdminController::class, 'carousels'])->name('admin.carousels');
        Route::get('/admin/carousels/create', [App\Http\Controllers\AdminController::class, 'formCarousels'])->name('carousels.add');
        Route::post('/admin/carousels/create', [App\Http\Controllers\AdminController::class, 'addCarousels']);
        Route::get('/admin/carousels/edit/{carousel}', [App\Http\Controllers\AdminController::class, 'editCarousel'])->name('carousel.edit');
        Route::patch('/admin/carousels/edit/{carousel}', [App\Http\Controllers\AdminController::class, 'updateCarousel'])->name('carousel.update');
        Route::delete('/admin/carousels/edit/{carousel}', [App\Http\Controllers\AdminController::class, 'destroyCarousel'])->name('carousel.destroy');

        Route::get('/admin/orders', [App\Http\Controllers\AdminController::class, 'orders'])->name('admin.orders');
        Route::get('/admin/order/{order}', [App\Http\Controllers\AdminController::class, 'orderView'])->name('order.view');

    });
});

//Profile
Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.show');
Route::post('/profile/edit', [App\Http\Controllers\ProfileController::class, 'saveDetails'])->name('profile.edit');
Route::get('/profile/passwordReset', [App\Http\Controllers\ProfileController::class, 'passwordIndex'])->name('profile.password');
Route::post('/profile/passwordReset/', [App\Http\Controllers\ProfileController::class, 'savePassword'])->name('profile.savePassword');



//Product

Route::get('/product/{product}', [App\Http\Controllers\ProductController::class, 'productViewIndex'])->name('product.show');



//Cart
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.show');
Route::post('/product/{product}', [App\Http\Controllers\CartController::class, 'addItemToCart'])->name('cart.add');
Route::delete('/cart/{item}', [App\Http\Controllers\CartController::class, 'delete'])->name('cart.delete');
Route::post('/cart', [App\Http\Controllers\OrderController::class, 'checkout'])->name('checkout');


//Carousels
