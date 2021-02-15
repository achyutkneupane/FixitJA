<?php

use App\Http\Controllers\GeneralUserController;
use App\Http\Controllers\IndividualContractorController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\MainController::class, 'home'])->name('homePage');
Auth::routes(['verify' => true]);
Route::get('/verify/{verification_code}', [App\Http\Controllers\Auth\RegisterController::class, 'verifyuser']);
Route::get('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'getEmail'])->name('forget-password');
Route::post('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'postEmail'])->name('forget-password');
Route::get('/reset-password/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'getPassword']);
Route::post('/reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'updatePassword'])->name('updatePassword');
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::put('/user/edit', [App\Http\Controllers\UserController::class, 'update']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Added by Achyut Neupane
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->middleware('auth')->name('admin_panel');
Route::get('/admin/category', [App\Http\Controllers\CategoryController::class, 'index'])->middleware('auth', 'checkIfAdmin')->name('listCategory');
Route::get('/admin/task', [App\Http\Controllers\TaskController::class, 'index'])->middleware('auth')->name('listTask');
Route::get('/admin/task/{id}', [App\Http\Controllers\TaskController::class, 'show'])->middleware('auth')->name('viewTask');
Route::get('/profile', [App\Http\Controllers\UserController::class, 'index'])->middleware('auth')->name('viewProfile');

// Route for about page
Route::get('/about', [App\Http\Controllers\MainController::class, 'about']);
//Route for contact us page
Route::get('/contact', [App\Http\Controllers\MainController::class, 'contact']);
//Route for faqs page
Route::get('/faqs', [App\Http\Controllers\MainController::class, 'faqs']);
//Route for creating new project wizard
Route::get('/project/create', [App\Http\Controllers\MainController::class, 'createProject']);












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
