<?php

use App\Http\Controllers\Api\MeterLogController;
use App\Http\Controllers\SMSGateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('meter-logs', MeterLogController::class);

Route::post('/sms-gateway', [SMSGateway::class, 'meter']);
