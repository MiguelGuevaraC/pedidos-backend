<?php

use App\Http\Controllers\Api\ProductController;
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
Route::resource('product', ProductController::class)->only(['index', 'show', 'store', 'update', 'destroy'])
->names(['index' => 'product.index', 'store' => 'product.store', 'show' => 'product.show', 'update' => 'product.update', 'destroy' => 'product.destroy']);



Route::group(["middleware" => ["auth:sanctum"]], function () {

    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('authenticate', [AuthController::class, 'authenticate']);

    // //USER
    // Route::resource('user', UserController::class)->only(['index', 'show', 'store', 'update', 'destroy'])
    //     ->names(['index' => 'user.index', 'store' => 'user.store', 'show' => 'user.show', 'update' => 'user.update', 'destroy' => 'user.destroy']);

    // //GROUP MENU
    // Route::resource('groupmenu', GroupMenuController::class)->only(['index', 'show', 'store', 'update', 'destroy'])
    //     ->names(['index' => 'groupmenu.index', 'store' => 'groupmenu.store', 'show' => 'groupmenu.show', 'update' => 'groupmenu.update', 'destroy' => 'groupmenu.destroy']);

    // //PERSON
    // Route::resource('person', PersonController::class)->only(['index', 'show', 'store', 'update', 'destroy'])
    //     ->names(['index' => 'person.index', 'store' => 'person.store', 'show' => 'person.show', 'update' => 'person.update', 'destroy' => 'person.destroy']);

    // //OPTION MENU
    // Route::resource('optionMenu', OptionMenuController::class)->only(['index', 'show', 'store', 'update', 'destroy'])
    //     ->names(['index' => 'optionMenu.index', 'store' => 'optionMenu.store', 'show' => 'optionMenu.show', 'update' => 'optionMenu.update', 'destroy' => 'optionMenu.destroy']);

    // //TYPEUSER
    // Route::resource('typeUser', TypeUserController::class)->only(['index', 'show', 'store', 'update', 'destroy'])
    //     ->names(['index' => 'typeUser.index', 'store' => 'typeUser.store', 'show' => 'typeUser.show',
    //         'update' => 'typeUser.update', 'destroy' => 'typeUser.destroy']);

    // Route::post('typeUser/setAccess', [TypeUserController::class, 'setAccess'])->name('typeUser.setAccess');



    

});
