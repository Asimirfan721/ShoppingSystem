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

Route::get('/cloth', [ClothesController::class, 'index'])->name('clothes');
Route::get('/clothes/create', [ClothesController::class, 'create'])->name('create');

//Jeans Controller

Route::get('/jeans', [JeansController::class, 'index'])->name('jeans');
Route::get('/jeans-index', [JeansController::class, 'index'])->name('jeans.index');
Route::get('/jeans/create', [JeansController::class, 'create'])->name('jeans.create');
Route::post('/jeans-store', [JeansController::class, 'store'])->name('jeans.store');

//ShirtsController
Route::get('/shirts', [ShirtsController::class, 'index'])->name('shirts');
Route::get('/shirts-index', [ShirtsController::class, 'index'])->name('shirts.index');
Route::get('/shirts/create', [ShirtsController::class, 'create'])->name('shirts.create');
Route::post('/shirts-store', [ShirtsController::class, 'store'])->name('shirts.store');


//watches
Route::get('/watches', [WatchesController::class, 'index'])->name('watches');
Route::get('/watches-index', [WatchesController::class, 'index'])->name('watches.index');
Route::get('/watches/create', [WatchesController::class, 'create'])->name('watches.create');
Route::post('/watches-store', [WatchesController::class, 'store'])->name('watches.store');
//Electronics
Route::get('/electroniccs', [ElectronicsController::class, 'index'])->name('electronics');
Route::get('/electronics', [ElectronicsController::class, 'index'])->name('electronics.index');
Route::get('/electronics/create', [ElectronicsController::class, 'create'])->name('create');
Route::post('/electronicss', [ElectronicsController::class, 'store'])->name('electronics.store');
Route::get('/electronics/create', [ElectronicsController::class, 'create'])->name('electronics.create');
Route::post('/item/store', [ItemController::class, 'store'])->name('item.store');


Route::get('/item/create', [ItemController::class, 'create'])->name('item.create');