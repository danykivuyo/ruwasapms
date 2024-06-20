<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CbwsoController;
use App\Http\Controllers\MeterController;
use App\Http\Controllers\MeterLogsController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\UserRequestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/test', function () {
        return redirect()->route('home')->with('success', 'Hello there');
    });
    Route::get('/', function () {
        return redirect()->route('home');
    });

    Route::get('/meters', [MeterController::class, 'meters'])->name('meters');
    Route::get('/meters/register', [MeterController::class, 'meters_register'])->name('meters.register');
    Route::get('/meters/{type}', [MeterController::class, 'meters'])->name('meters.filter');
    // Route::get('/meters/hhc', [MeterController::class, 'meters_hhc'])->name('meters.hhc');
    // Route::get('/meters/pd', [MeterController::class, 'meters_pd'])->name('meters.pd');
    // Route::get('/meters/zn', [MeterController::class, 'meters_zn'])->name('meters.zn');

    Route::get('/cbwso', [CbwsoController::class, 'index'])->name('cbwso.index');
    Route::get('/cbwso/register', [CbwsoController::class, 'register'])->name('cbwso.register');
    Route::get('/purchase', [PurchaseController::class, 'purchase'])->name('purchase');
    Route::get('/purchase/history', [PurchaseController::class, 'history'])->name('purchase.history');
    Route::get('/transactions', [TransactionsController::class, 'transactions'])->name('transactions');
    Route::get('/users/customers', function () {
        return view('customers');
    })->name('customers');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::fallback(function () {
    return response()->view('errors.404', [], 404);
})->name('notfound');

Route::get('/dashboard', function () {
    return redirect()->route('home');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::resource('user-requests', UserRequestController::class);
Route::resource('reports/meters-logs', MeterLogsController::class)->names([
    "fetch" => "meterlogs.fetch",
    "index" => "meterlogs.index",
    "store" => "meterlogs.store"
]);
// Authentication Routes
require __DIR__ . '/auth.php';