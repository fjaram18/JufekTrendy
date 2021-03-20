<?php

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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name("home.index");
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/admin', [App\Http\Controllers\Admin\AdminHomeController::class, 'index'])->name('admin.home');


// Auth
Auth::routes();

// Routes Admin Customization
Route::get('/customization/menu', [App\Http\Controllers\Admin\AdminCustomizationController::class, 'menu'])->name("customization.menu");
Route::get('/customization/show/{id}', [App\Http\Controllers\Admin\AdminCustomizationController::class, 'show'])->name('customization.show');
Route::get('/customization/create', [App\Http\Controllers\Admin\AdminCustomizationController::class, 'create'])->name('customization.create');
Route::post('/customization/save', [App\Http\Controllers\Admin\AdminCustomizationController::class, 'save'])->name('customization.save');
Route::get('/customization/list', [App\Http\Controllers\Admin\AdminCustomizationController::class, 'list'])->name('customization.list');
Route::get('/customization/delete/{id}', [App\Http\Controllers\Admin\AdminCustomizationController::class, 'delete'])->name('customization.delete');

// Routes Admin Product
Route::get('/product/menu', [App\Http\Controllers\Admin\AdminProductController::class, 'menu'])->name("product.menu");
Route::get('/product/show/{id}', [App\Http\Controllers\Admin\AdminProductController::class, 'show'])->name("product.show");
Route::get('/product/create', [App\Http\Controllers\Admin\AdminProductController::class, 'create'])->name("product.create");
Route::post('/product/save', [App\Http\Controllers\Admin\AdminProductController::class, 'save'])->name("product.save");
Route::get('/product/list', [App\Http\Controllers\Admin\AdminProductController::class, 'list'])->name("product.list");
Route::get('/product/delete/{id}', [App\Http\Controllers\Admin\AdminProductController::class, 'delete'])->name("product.delete");

// Routes Admin Order
Route::get('/order/show/{id}', [App\Http\Controllers\Admin\AdminOrderController::class, 'show'])->name("order.show");
Route::get('/order/create', [App\Http\Controllers\Admin\AdminOrderController::class, 'create'])->name("order.create");
Route::post('/order/save', [App\Http\Controllers\Admin\AdminOrderController::class, 'save'])->name("order.save");
Route::get('/order/list', [App\Http\Controllers\Admin\AdminOrderController::class, 'list'])->name("order.list");
Route::get('/order/delete/{id}', [App\Http\Controllers\Admin\AdminOrderController::class, 'delete'])->name("order.delete");

// Routes Admin Category
Route::get('/category/show/{id}', [App\Http\Controllers\Admin\AdminCategoryController::class, 'show'])->name("category.show");
Route::get('/category/create', [App\Http\Controllers\Admin\AdminCategoryController::class, 'create'])->name("category.create");
Route::post('/category/save', [App\Http\Controllers\Admin\AdminCategoryController::class, 'save'])->name("category.save");
Route::get('/category/list', [App\Http\Controllers\Admin\AdminCategoryController::class, 'list'])->name("category.list");
Route::get('/category/delete/{id}', [App\Http\Controllers\Admin\AdminCategoryController::class, 'delete'])->name("category.delete");