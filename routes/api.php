<?php

use App\Http\Controllers\Api\CatgoryController;
use App\Http\Controllers\Api\NewController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SpecializationController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'v1', 'middleware' => 'lang'], function () {


    Route::group(['middleware' => 'auth:api'], function () {

        Route::post('buy-product', [ProductController::class, 'buyProudct']);
        Route::get('user-products', [ProductController::class, 'getBuyProudct']);
    });

    Route::apiResource('products', ProductController::class);

    Route::apiResource('categories', CatgoryController::class);
    Route::get('sub-categories/{parent_id}', [CatgoryController::class, 'getSubCategories']);

    Route::apiResource('news', NewController::class);
    Route::apiResource('specializations', SpecializationController::class);
});
