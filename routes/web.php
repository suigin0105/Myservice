<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VendingMachineController;
use App\Http\Controllers\ColumnController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/sales', [SaleController::class, 'index']);
Route::get('/sales/create', [SaleController::class, 'create'])->middleware('auth');
Route::get('/sales/{sale}', [SaleController::class, 'show'])->middleware('auth');

Route::post('/sales/store', [SaleController::class, 'store']);

Route::get('/products', [ProductController::class, 'index']);

Route::post('/products/store', [ProductController::class, 'store']);

Route::get('/products/edit/{product}', [ProductController::class, 'edit']);
Route::put('/products/edit/{product}', [ProductController::class, 'update']);

Route::delete('/products/{product}', [ProductController::class, 'destroy']);

Route::get('/vending_machines', [VendingMachineController::class, 'index']);

Route::post('/vending_machines/store', [VendingMachineController::class, 'store']);

Route::get('/vending_machines/edit/{vendingmachine}', [VendingMachineController::class, 'edit']);
Route::put('/vending_machines/edit/{vendingmachine}', [VendingMachineController::class, 'update']);

Route::delete('/vending_machines/{vendingmachine}', [VendingMachineController::class, 'destroy']);

Route::get('/columns', [ColumnController::class, 'index']);

Route::post('/columns/store', [ColumnController::class, 'store']);




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
