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




//Metronics demo
Route::get('/metronics', [App\Http\Controllers\PagesController::class, 'index']);

// Demo routes
Route::get('/metronics/datatables', [App\Http\Controllers\PagesController::class, 'datatables']);
Route::get('/metronics/ktdatatables', [App\Http\Controllers\PagesController::class, 'ktDatatables']);
Route::get('/metronics/select2', [App\Http\Controllers\PagesController::class, 'select2']);
Route::get('/metronics/jquerymask', [App\Http\Controllers\PagesController::class, 'jQueryMask']);
Route::get('/metronics/icons/custom-icons', [App\Http\Controllers\PagesController::class, 'customIcons']);
Route::get('/metronics/icons/flaticon', [App\Http\Controllers\PagesController::class, 'flaticon']);
Route::get('/metronics/icons/fontawesome', [App\Http\Controllers\PagesController::class, 'fontawesome']);
Route::get('/metronics/icons/lineawesome', [App\Http\Controllers\PagesController::class, 'lineawesome']);
Route::get('/metronics/icons/socicons', [App\Http\Controllers\PagesController::class, 'socicons']);
Route::get('/metronics/icons/svg', [App\Http\Controllers\PagesController::class, 'svg']);
Route::get('/metronics/login1', [App\Http\Controllers\PagesController::class, 'login1']);
Route::get('/metronics/wizard1', [App\Http\Controllers\PagesController::class, 'wizard1']);

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', [App\Http\Controllers\PagesController::class, 'quickSearch'])->name('quick-search');