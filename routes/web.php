<?php

use App\Http\Controllers\GeneralUserController;
use App\Http\Controllers\IndividualContractorController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
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
Route::get('verify/{verification_code}', [App\Http\Controllers\Auth\VerificationController::class, 'verifyUser']);
Route::get('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'getEmail'])->name('forget-password');
Route::post('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'postEmail'])->name('forget-password');
Route::get('/reset-password/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'getPassword']);
Route::post('/reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'updatePassword'])->name('updatePassword');
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::put('/user/edit', [App\Http\Controllers\UserController::class, 'update']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Added by Achyut Neupane
Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login');
Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'index'])->middleware('auth', 'checkIfAdmin')->name('listCategory');
Route::post('/category/add', [App\Http\Controllers\CategoryController::class, 'store'])->middleware('auth', 'checkIfAdmin');
Route::get('/categories/proposed', [App\Http\Controllers\CategoryController::class, 'proposed'])->middleware('auth', 'checkIfAdmin')->name('proposedCategory');
Route::put('/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->middleware('auth', 'checkIfAdmin');
Route::get('/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->middleware('auth', 'checkIfAdmin');
Route::post('/sub_category/add', [App\Http\Controllers\SubCategoryController::class, 'store'])->middleware('auth', 'checkIfAdmin');
Route::put('/sub_category/edit/{id}', [App\Http\Controllers\SubCategoryController::class, 'update'])->middleware('auth', 'checkIfAdmin');
Route::get('/sub_category/delete/{id}', [App\Http\Controllers\SubCategoryController::class, 'destroy'])->middleware('auth', 'checkIfAdmin');
Route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index'])->middleware('auth')->name('listTask');
Route::get('/task/{id}', [App\Http\Controllers\TaskController::class, 'show'])->middleware('auth')->name('viewTask');
Route::get('/task/{id}/assigned_by', [App\Http\Controllers\TaskController::class, 'assignedBy'])->middleware('auth')->name('taskAssignedBy');
Route::get('/task/{id}/assigned_to', [App\Http\Controllers\TaskController::class, 'assignedTo'])->middleware('auth')->name('taskAssignedTo');
Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->middleware('auth')->name('viewProfile');
Route::get('/user/{id}', [App\Http\Controllers\UserController::class, 'show'])->middleware('auth', 'checkIfAdmin')->name('viewUser');
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->middleware('auth', 'checkIfAdmin')->name('viewUsers');
Route::get('/error_log', [App\Http\Controllers\AdminController::class, 'error_log'])->middleware('auth', 'checkIfAdmin')->name('viewErrorLog');
Route::get('/error_{id}', [App\Http\Controllers\AdminController::class, 'error_detail'])->middleware('auth', 'checkIfAdmin')->name('viewErrorDetail');
Route::put('/error_{id}/solved', [App\Http\Controllers\AdminController::class, 'error_solved'])->middleware('auth', 'checkIfAdmin')->name('errorSolved');
Route::get('/security', [App\Http\Controllers\UserController::class, 'security'])->middleware('auth')->name('accountSecurity');
Route::get('/resend-email', [App\Http\Controllers\Auth\VerificationController::class, 'resendVerifyEmail'])->name('resendEmail');
//Route for profile wizard
Route::get('/profile/init', [App\Http\Controllers\UserController::class, 'updateprofile1'])->name('profileWizard');
Route::get('/profile/init', [App\Http\Controllers\UserController::class,  'getprofileImage'])->name('profileWizard');
Route::post('/profile/init', [App\Http\Controllers\UserController::class, 'addprofiledetails']);



Route::get('/profile/{id}', [App\Http\Controllers\CategoryController::class, 'getSubCategory']);

// Route for about page
Route::get('/about', [App\Http\Controllers\MainController::class, 'about']);
//Route for contact us page
Route::get('/contact', [App\Http\Controllers\MainController::class, 'contact']);
//Route for faqs page
Route::get('/faqs', [App\Http\Controllers\MainController::class, 'faqs']);

//Route for creating new project wizard
Route::get('/project/create', [App\Http\Controllers\MainController::class, 'createProject']);
//Route for viewing all categories
Route::get('/categories/all', [App\Http\Controllers\MainController::class, 'categories']);

Route::get('/hello',  [App\Http\Controllers\CategoryController::class, 'getCategory']);
//Route for the addding education qualification




// for skilled worker



Route::get('/addeducation', [App\Http\Controllers\UserController::class, 'addeducation']);
















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
Route::get('/metronics/tagify', [App\Http\Controllers\PagesController::class, 'tagify']);

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', [App\Http\Controllers\PagesController::class, 'quickSearch'])->name('quick-search');