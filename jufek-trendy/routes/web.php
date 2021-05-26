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

// Routes Home
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name("home.index");
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\Admin\AdminHomeController::class, 'index'])->name('admin.home');

//Routes User Products
Route::get('/product/show/{id}', [App\Http\Controllers\User\ProductController::class, 'show'])->name('product.show');
Route::get('/product/list', [App\Http\Controllers\User\ProductController::class, 'list'])->name('product.list');

//Routes User Customizations
Route::get('/customization/show/{id}', [App\Http\Controllers\User\CustomizationController::class, 'show'])->name('customization.show');
Route::get('/customization/list', [App\Http\Controllers\User\CustomizationController::class, 'list'])->name('customization.list');

//Routes User Shopping Cart
Route::get('/cart/index', [App\Http\Controllers\User\CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [App\Http\Controllers\User\CartController::class, 'add'])->name('cart.add');
Route::get('/cart/addCustomization/{id}', [App\Http\Controllers\User\CartController::class, 'addCustomization'])->name('cart.addCustomization');
Route::get('/cart/delete/{id}', [App\Http\Controllers\User\CartController::class, 'delete'])->name('cart.delete');
Route::get('/cart/deleteCustomization', [App\Http\Controllers\User\CartController::class, 'deleteCustomization'])->name('cart.deleteCustomization');
Route::get('/cart/removeAll', [App\Http\Controllers\User\CartController::class, 'removeAll'])->name('cart.removeAll');

//Routes User Orders
Route::get('/order/save', [App\Http\Controllers\User\OrderController::class, 'save'])->name("order.save");
Route::get('/order/show/{id}', [App\Http\Controllers\User\OrderController::class, 'show'])->name("order.show");
Route::get('/order/cancel/{id}', [App\Http\Controllers\User\OrderController::class, 'cancel'])->name("order.cancel");
Route::get('/order/list', [App\Http\Controllers\User\OrderController::class, 'list'])->name("order.list");
Route::get('/order/export', [App\Http\Controllers\User\OrderController::class, 'export'])->name("order.export");

//Route search results
Route::get('/search/index', [App\Http\Controllers\User\SearchController::class, 'index'])->name('search.index');

//Route allied products
Route::get('/ally/index', [App\Http\Controllers\User\AllyController::class, 'index'])->name('ally.index');

//Route allied products
Route::get('/currency/index', [App\Http\Controllers\User\CurrencyController::class, 'index'])->name('currency.index');

// Auth
Auth::routes();

// Routes Admin Customization
Route::get('/admin/customization/menu', [App\Http\Controllers\Admin\AdminCustomizationController::class, 'menu'])->name("admin.customization.menu");
Route::get('/admin/customization/show/{id}', [App\Http\Controllers\Admin\AdminCustomizationController::class, 'show'])->name("admin.customization.show");
Route::get('/admin/customization/create', [App\Http\Controllers\Admin\AdminCustomizationController::class, 'create'])->name("admin.customization.create");
Route::post('/admin/customization/save', [App\Http\Controllers\Admin\AdminCustomizationController::class, 'save'])->name("admin.customization.save");
Route::get('/admin/customization/list', [App\Http\Controllers\Admin\AdminCustomizationController::class, 'list'])->name("admin.customization.list");
Route::get('/admin/customization/sort/{sort}', [App\Http\Controllers\Admin\AdminCustomizationController::class, 'sort'])->name("admin.customization.sort");
Route::get('/admin/customization/delete/{id}', [App\Http\Controllers\Admin\AdminCustomizationController::class, 'delete'])->name("admin.customization.delete");

// Routes Admin Product
Route::get('/admin/product/menu', [App\Http\Controllers\Admin\AdminProductController::class, 'menu'])->name("admin.product.menu");
Route::get('/admin/product/show/{id}', [App\Http\Controllers\Admin\AdminProductController::class, 'show'])->name("admin.product.show");
Route::get('/admin/product/create', [App\Http\Controllers\Admin\AdminProductController::class, 'create'])->name("admin.product.create");
Route::post('/admin/product/save', [App\Http\Controllers\Admin\AdminProductController::class, 'save'])->name("admin.product.save");
Route::get('/admin/product/list', [App\Http\Controllers\Admin\AdminProductController::class, 'list'])->name("admin.product.list");
Route::get('/admin/product/sort/{sort}', [App\Http\Controllers\Admin\AdminProductController::class, 'sort'])->name("admin.product.sort");
Route::get('/admin/product/delete/{id}', [App\Http\Controllers\Admin\AdminProductController::class, 'delete'])->name("admin.product.delete");

// Routes Admin Order
Route::get('/admin/order/menu', [App\Http\Controllers\Admin\AdminOrderController::class, 'menu'])->name("admin.order.menu");
Route::get('/admin/order/show/{id}', [App\Http\Controllers\Admin\AdminOrderController::class, 'show'])->name("admin.order.show");
Route::get('/admin/order/create', [App\Http\Controllers\Admin\AdminOrderController::class, 'create'])->name("admin.order.create");
Route::post('/admin/order/save', [App\Http\Controllers\Admin\AdminOrderController::class, 'save'])->name("admin.order.save");
Route::get('/admin/order/list', [App\Http\Controllers\Admin\AdminOrderController::class, 'list'])->name("admin.order.list");
Route::get('/admin/order/sort/{sort}', [App\Http\Controllers\Admin\AdminOrderController::class, 'sort'])->name("admin.order.sort");
Route::get('/admin/order/delete/{id}', [App\Http\Controllers\Admin\AdminOrderController::class, 'delete'])->name("admin.order.delete");

// Routes Admin Category
Route::get('/admin/category/menu', [App\Http\Controllers\Admin\AdminCategoryController::class, 'menu'])->name("admin.category.menu");
Route::get('/admin/category/show/{id}', [App\Http\Controllers\Admin\AdminCategoryController::class, 'show'])->name("admin.category.show");
Route::get('/admin/category/create', [App\Http\Controllers\Admin\AdminCategoryController::class, 'create'])->name("admin.category.create");
Route::post('/admin/category/save', [App\Http\Controllers\Admin\AdminCategoryController::class, 'save'])->name("admin.category.save");
Route::get('/admin/category/list/', [App\Http\Controllers\Admin\AdminCategoryController::class, 'list'])->name("admin.category.list");
Route::get('/admin/category/sort/{sort}', [App\Http\Controllers\Admin\AdminCategoryController::class, 'sort'])->name("admin.category.sort");
Route::get('/admin/category/delete/{id}', [App\Http\Controllers\Admin\AdminCategoryController::class, 'delete'])->name("admin.category.delete");

// Routes Admin Item
Route::get('/admin/item/menu', [App\Http\Controllers\Admin\AdminItemController::class, 'menu'])->name("admin.item.menu");
Route::get('/admin/item/show/{id}', [App\Http\Controllers\Admin\AdminItemController::class, 'show'])->name("admin.item.show");
Route::get('/admin/item/create', [App\Http\Controllers\Admin\AdminItemController::class, 'create'])->name("admin.item.create");
Route::post('/admin/item/save', [App\Http\Controllers\Admin\AdminItemController::class, 'save'])->name("admin.item.save");
Route::get('/admin/item/list', [App\Http\Controllers\Admin\AdminItemController::class, 'list'])->name("admin.item.list");
Route::get('/admin/item/delete/{id}', [App\Http\Controllers\Admin\AdminItemController::class, 'delete'])->name("admin.item.delete");

// Routes Lang
Route::get('lang/{lang}',[App\Http\Controllers\LanguageController::class, 'switchLang'])->name('lang.switch');