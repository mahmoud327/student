<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SubServiceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SubCategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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
Route::redirect('/', 'admin/login-page');


Auth::routes();

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
        Route::get('login-page', 'AuthController@loginPage')->name('admin.login.page');
        Route::post('login', 'AuthController@login')->name('admin.login');
        Route::get('logout', 'AuthController@logout')->name('admin.logout');

        Route::group(['middleware' => ['auth:admins']], function () {
            Route::get('home', 'HomeController@index')->name('admin.home');

            //route-for-services
            Route::resource('news', NewController::class);
            //route-for-services
            Route::resource('roles', RoleController::class);
            //route-for-services
            Route::resource('admins', AdminController::class);

            Route::resource('users', UserController::class);

            Route::get('user/publish/{id}', [UserController::class, 'Publish'])->name('user.publish');
            Route::get('user/not-publish/{id}', [UserController::class, 'notPublish'])->name('user.not-publish');


            Route::resource('patient', PatientController::class);

            Route::resource('products', ProductController::class);

            Route::resource('categories', CategoryController::class);
            Route::get('categories/sub-categories/{parent_id?}', [SubCategoryController::class, 'index'])->name('category.sub-categories');
            Route::post('categories/sub-categories/{parent_id?}', [SubCategoryController::class, 'store'])->name('service.sub-services.store');


        });
    });
});
