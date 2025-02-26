<?php
use Illuminate\App\Http\Route\Facades;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ElectronicsController;
use App\Http\Controllers\ClothesController;
use App\Http\Controllers\JeansController;
use App\Http\Controllers\ShirtsController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\WatchesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\PracticeController;
Route::get('/', function () {
    return view('home');
});
//Clothes
Route::get('/electronics', [ElectronicsController::class, 'index'])->name('electronics');
Route::get('/clothes', [ClothesController::class, 'index'])->name('clothes.index');
Route::get('/cloth', [ClothesController::class, 'index'])->name('clothes');
Route::get('/clothes/create', [ClothesController::class, 'create'])->name('create');
Route::delete('/clothes/{id}', [ClothesController::class, 'destroy'])->name('clothes.destroy');
Route::get('/clothes/{id}/edit', [ClothesController::class, 'edit'])->name('clothes.edit');

// Update the specific item
Route::put('/clothes/{id}', [ClothesController::class, 'update'])->name('clothes.update');


 //Jeans Controller

Route::get('/jeans', [JeansController::class, 'index'])->name('jeans');
Route::get('/jeans-index', [JeansController::class, 'index'])->name('jeans.index');
Route::get('/jeans/create', [JeansController::class, 'create'])->name('jeans.create');
Route::post('/jeans-store', [JeansController::class, 'store'])->name('jeans.store');

Route::get('/jeans/{id}/edit', [JeansController::class, 'edit'])->name('jeans.edit');
Route::put('/jeans/{id}', [JeansController::class, 'update'])->name('jeans.update');

//ShirtsController
Route::get('/shirts', [ShirtsController::class, 'index'])->name('shirts');
Route::get('/shirts-index', [ShirtsController::class, 'index'])->name('shirts.index');
Route::get('/shirts/create', [ShirtsController::class, 'create'])->name('shirts.create');
Route::post('/shirts-store', [ShirtsController::class, 'store'])->name('shirts.store');
Route::delete('/shirts/{id}', [ShirtsController::class, 'destroy'])->name('shirts.destroy');

Route::get('/shirts/{id}/edit', [ShirtsController::class, 'edit'])->name('shirts.edit');
Route::put('/shirts/{id}', [ShirtsController::class, 'update'])->name('shirts.update');


//watches
Route::get('/watches', [WatchesController::class, 'index'])->name('watches');
Route::get('/watches-index', [WatchesController::class, 'index'])->name('watches.index');
Route::get('/watches/create', [WatchesController::class, 'create'])->name('watches.create');
Route::post('/watches-store', [WatchesController::class, 'store'])->name('watches.store');
Route::delete('/watches/{id}', [watchesController::class, 'destroy'])->name('watches.destroy');
Route::get('/watches/{id}/edit', [WatchesController::class, 'edit'])->name('watches.edit');
Route::put('/watches/{id}', [WatchesController::class, 'update'])->name('watches.update');

//Electronics
Route::get('/electroniccs', [ElectronicsController::class, 'index'])->name('electronics');
Route::get('/electronics', [ElectronicsController::class, 'index'])->name('electronics.index');
Route::get('/electronics/create', [ElectronicsController::class, 'create'])->name('create');
Route::post('/electronicss', [ElectronicsController::class, 'store'])->name('electronics.store');
Route::get('/electronics/create', [ElectronicsController::class, 'create'])->name('electronics.create');
Route::post('/item/store', [ItemController::class, 'store'])->name('item.store');
Route::get('/item/create', [ItemController::class, 'create'])->name('item.create');
Route::delete('/electronics/{id}', [ElectronicsController::class, 'destroy'])->name('electronics.destroy');
Route::get('/electronics/{id}/edit', [ElectronicsController::class, 'edit'])->name('electronics.edit');
Route::put('/electronics/{id}', [ElectronicsController::class, 'update'])->name('electronics.update');



Route::get('/', function () {
    return view('home'); // Replace 'home' with 'welcome' or another view name
})->name('home');

//product controller.
// Route::middleware(['auth'])->group(function () {
//     Route::get('/electronics', [ProductController::class, 'electronics'])->name('electronics');
//     Route::get('/clothes', [ProductController::class, 'clothes'])->name('clothes');
//     Route::get('/jeans', [ProductController::class, 'jeans'])->name('jeans');
//     Route::get('/shirts', [ProductController::class, 'shirts'])->name('shirts');
//     Route::get('/watches', [ProductController::class, 'watches'])->name('watches');
// });
 

Route::delete('/image/{id}', [JeansController::class, 'destroy'])->name('image.delete');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); 



//New Practice

Route::get('/1-New', [PracticeController::class, 'index'])->name('New-1');
Route::get('second',[PracticeController::class, 'create'])->name('Second');