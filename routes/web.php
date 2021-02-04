<?php

use App\Http\Controllers\UserController;
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

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('homePage');
Auth::routes();

Route::put('/user/edit', [App\Http\Controllers\UserController::class, 'update']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->middleware('auth', 'checkIfAdmin')->name('admin_panel');
Route::get('/admin/add_category', [App\Http\Controllers\CategoryController::class, 'create'])->middleware('auth', 'checkIfAdmin')->name('addCategory');
Route::get('/admin/add_sub_category', [App\Http\Controllers\SubCategoryController::class, 'create'])->middleware('auth', 'checkIfAdmin')->name('addSubCategory');