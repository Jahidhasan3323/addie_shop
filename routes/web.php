<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StockProductController;
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

Route::get('/', function () {
    return view('welcome');
});

//backend start
//product
Route::resource('products', ProductController::class);
//stock
Route::resource('stock', StockController::class);
Route::group(['prefix' => 'stock'], function () {
    Route::get('/products/{id}', [StockProductController::class, 'index']);
    Route::get('/product/add/', [StockProductController::class, 'create']);
    Route::post('/product/add/', [StockProductController::class, 'store']);

});
Route::group(['prefix' => 'shopping-cart'], function () {
    Route::get('/', [ShoppingCartController::class, 'list']);
    Route::get('/add/{stockId}/{productId}', [ShoppingCartController::class, 'add']);
    Route::get('/remove/{rowId}', [ShoppingCartController::class, 'remove']);
    Route::post('/update', [ShoppingCartController::class, 'update']);

});

//backend end
