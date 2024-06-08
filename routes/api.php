<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Auth\AuthController;
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

Route::post('login', [AuthController::class, 'login'])->name('login');

//    PRODUCT
Route::resource('product', ProductController::class)->only(['index', 'show'])
    ->names(['index' => 'product.index', 'show' => 'product.show']);

//   CATEGORY
Route::resource('category', CategoryController::class)->only(['index', 'show'])
    ->names(['index' => 'category.index', 'show' => 'category.show']);

Route::group(["middleware" => ["auth:sanctum"]], function () {

    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('authenticate', [AuthController::class, 'authenticate']);

    Route::post('user', [UserController::class, 'store']);

//    PRODUCT
    Route::resource('product', ProductController::class)->only(['store', 'update', 'destroy'])
        ->names(['store' => 'product.store', 'update' => 'product.update', 'destroy' => 'product.destroy']);

    //    PRODUCT
    Route::resource('category', CategoryController::class)->only(['store', 'update', 'destroy'])
        ->names(['store' => 'category.store', 'update' => 'category.update', 'destroy' => 'category.destroy']);

});
