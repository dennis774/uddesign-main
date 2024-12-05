<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DataController;

Route::get('user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:api')->get('user', function (Request $request) {
    return $request->user();
});

Route::get('data', [DataController::class, 'retrieveData'])->middleware('auth:sanctum');

Route::post('login', [AuthController::class, 'login']);


// Route::post('register', [AuthController::class, 'register']);
// Route::any('login', [AuthController::class, 'handleInvalidMethod'])->where(['login' => '.*']);
// Route::get('data', [DataController::class, 'retrieveData']);
// Route::match(['get', 'post'], 'login', [AuthController::class, 'login']);

Route::get('reports', [DataController::class, 'retrieveReports']);

Route::get('merch-category', [DataController::class, 'retrieveMerchCategories']);
Route::get('merch-type', [DataController::class, 'retrieveMerchType']);
Route::get('merch-details', [DataController::class, 'retrieveMerchDetails']);

Route::get('print-category', [DataController::class, 'retrievePrintCategories']);
Route::get('print-type', [DataController::class, 'retrievePrintType']);
Route::get('print-details', [DataController::class, 'retrievePrintDetails']);

Route::get('expense-category', [DataController::class, 'retrieveExpenseCategories']);
Route::get('expense-type', [DataController::class, 'retrieveExpenseType']);
Route::get('expense-details', [DataController::class, 'retrieveExpenseDetails']);