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
Route::get('/category/{id}', [App\Http\Controllers\SubCategoryController::class,'list']);
Route::get('/cities/{id}', [App\Http\Controllers\CityController::class,'list']);
Route::post('/addprofile',[App\Http\Controller\UserController::class, 'updateprofile']);
Route::get('/subcats', [App\Http\Controllers\SubCategoryController::class,'listcats']);