<?php
use Illuminate\App\Http\Route\Facades;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ElectronicsController;
use App\Http\Controllers\ClothesController;
use App\Http\Controllers\JeansController;
use App\Http\Controllers\ShirtsController;
use App\Http\Controllers\WatchesController;

Route::get('/', function () {
    return view('home');
});

Route::get('/electronics', [ElectronicsController::class, 'index'])->name('electronics');
Route::get('/clothes', [ClothesController::class, 'index'])->name('clothes');
Route::get('/jeans', [JeansController::class, 'index'])->name('jeans');
Route::get('/shirts', [ShirtsController::class, 'index'])->name('shirts');
Route::get('/watches', [WatchesController::class, 'index'])->name('watches');



//Electronics
Route::get('/electronics', [ElectronicsController::class, 'index'])->name('electronics');
Route::get('/electronics/create', [ElectronicsController::class, 'create'])->name('create');
Route::post('/electronics', [ElectronicsController::class, 'store'])->name('electronics.store');
