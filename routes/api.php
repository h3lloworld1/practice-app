<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Menu\MenuController;
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

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

// auth
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('login');


// menu for admins
Route::prefix('menus')->group(function () {
    Route::post('/create', [MenuController::class, 'store'])->name('menus.store');
    Route::put('/update/{id}', [MenuController::class, 'update'])->name('menus.update');
});

// menu for users
Route::prefix('menus')->group(function () {
    Route::get('/', [MenuController::class, 'index'])->name('menus');
    Route::get('/{id}', [MenuController::class, 'get'])->name('menus.get');
    Route::delete('/delete/{id}', [MenuController::class, 'destroy'])->name('menus.destroy');
});


