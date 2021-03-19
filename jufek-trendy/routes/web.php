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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/customization/show/{id}', [App\Http\Controllers\CustomizationController::class, 'show'])->name('customization.show');

Route::get('/customization/create', [App\Http\Controllers\CustomizationController::class, 'create'])->name('customization.create');

Route::get('/customization/save', [App\Http\Controllers\CustomizationController::class, 'save'])->name('customization.save');

Route::get('/customization/list', [App\Http\Controllers\CustomizationController::class, 'list'])->name('customization.list');

Route::get('/customization/delete/{id}', [App\Http\Controllers\CustomizationController::class, 'delete'])->name('customization.delete');
