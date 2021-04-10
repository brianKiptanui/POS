<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PreturnController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
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


// Route::group(['prefix'=>'categories'], function (){

// });

Route::apiResource('categories', CategoryController::class);

Route::apiResource('/products', ProductController::class);

Route::apiResource('/sales', SaleController::class);

Route::apiResource('/purchases', PurchaseController::class);

Route::apiResource('/invoices', InvoiceController::class);

Route::apiResource('/payments', PaymentController::class);

Route::apiResource('/preturned', PreturnController::class);
