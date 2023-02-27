<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Menu\MenuController;
use App\Http\Controllers\Order\OrderInProgressController;
use App\Http\Controllers\Order\OrderSentController;
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
    Route::get('/{id}', [MenuController::class, 'get'])->name('menus.get');
    Route::delete('/delete/{id}', [MenuController::class, 'destroy'])->name('menus.destroy');
});

// menu for all
Route::prefix('menus')->group(function () {
    Route::get('/', [MenuController::class, 'index'])->name('menus.index');
});

// orders
Route::prefix('orders')->group(function () {
    Route::post('/send-order', [OrderSentController::class, 'store'])->name('order.store');
    Route::get('/sent-orders', [OrderSentController::class, 'index'])->name('order.index');
    Route::put('/sent-orders/update/{id}', [OrderSentController::class, 'update'])->name('order.update');
    Route::put('/sent-orders/decline/{id}', [OrderSentController::class, 'decline'])->name('order.decline');

    Route::get('/in-progress', [OrderInProgressController::class, 'index'])->name('order_in_progress.index');
    Route::post('/in-progress/create', [OrderInProgressController::class, 'store'])->name('order_in_progress.store');
});


