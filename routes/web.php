<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrdersController;
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

Route::get('/', [ProductController::class, 'index']);


Route::get('/order/list', [OrdersController::class, 'list']);
Route::post('/order/create', [OrdersController::class, 'store']);
Route::get('/response', [OrdersController::class, 'response']);
Route::get('/order/{id}', [OrdersController::class, 'index']);
