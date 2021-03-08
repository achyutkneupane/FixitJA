<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Auth::routes();

Route::get('/category/{id}', [App\Http\Controllers\CategoryController::class,' getCategory']);
Route::post('/addprofile',[App\Http\Controller\UserController::class, 'updateprofile']);
// Added by Achyut Neupane
Route::prefix('/admin')->group(function () {
    Route::post('/add_category', [App\Http\Controllers\CategoryController::class, 'store']);
    Route::put('/edit_category/{id}', [App\Http\Controllers\CategoryController::class, 'update']);
    Route::get('/delete_category/{id}', [App\Http\Controllers\CategoryController::class, 'destroy']);
    Route::post('/add_sub_category', [App\Http\Controllers\SubCategoryController::class, 'store']);
    Route::put('/edit_sub_category/{id}', [App\Http\Controllers\SubCategoryController::class, 'update']);
    Route::get('/delete_sub_category/{id}', [App\Http\Controllers\SubCategoryController::class, 'destroy']);
});