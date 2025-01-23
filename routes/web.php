<?php
use Illuminate\App\Http\Route\Facades;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ElectronicsController;
use App\Http\Controllers\ClothesController;
use App\Http\Controllers\JeansController;
use App\Http\Controllers\ShirtsController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\WatchesController;

Route::get('/', function () {
    return view('home');
});

Route::get('/electronics', [ElectronicsController::class, 'index'])->name('electronics');
Route::get('/clothes', [ClothesController::class, 'index'])->name('clothes.index');
Route::get('/clothes', [ClothesController::class, 'index'])->name('clothes');
Route::get('/clothes/create', [ClothesController::class, 'create'])->name('create');
Route::get('/jeans', [JeansController::class, 'index'])->name('jeans');
Route::get('/shirts', [ShirtsController::class, 'index'])->name('shirts');
Route::get('/watches', [WatchesController::class, 'index'])->name('watches');

//Electronics
Route::get('/electronics', [ElectronicsController::class, 'index'])->name('electronics');
Route::get('/electronics/create', [ElectronicsController::class, 'create'])->name('create');
Route::post('/electronics', [ElectronicsController::class, 'store'])->name('electronics.store');
Route::get('/electronics/create', [ElectronicsController::class, 'create'])->name('electronics.create');
Route::post('/item/store', [ItemController::class, 'store'])->name('item.store');

