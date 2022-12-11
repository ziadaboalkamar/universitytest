<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Front\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/product/{id}', [HomeController::class, 'product'])->name('product');
Route::get('/product/show/{id}', [HomeController::class, 'showProduct'])->name('show.product');
Route::any('/product/addToCart/{id}', [HomeController::class, 'addToCart'])->name('addToCart');
Route::post('/product/search', [HomeController::class, 'searchProduct'])->name('search.product');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::as('admin.')
        ->prefix("admin")
        ->group(function () {
//    store routes
    Route::as('store.')
        ->prefix("store")
        ->group(function () {
            Route::get('/', [StoreController::class, 'index'])->name('index');
            Route::get('/create', [StoreController::class, 'create'])->name('create');
            Route::post('/store', [StoreController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [StoreController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [StoreController::class, 'update'])->name('update');
            Route::any('/delete/{id}', [StoreController::class, 'destroy'])->name('delete');

    });
            Route::as('product.')
                ->prefix("product")
                ->group(function () {
                    Route::get('/', [ProductController::class, 'index'])->name('index');
                    Route::get('/create', [ProductController::class, 'create'])->name('create');
                    Route::post('/store', [ProductController::class, 'store'])->name('store');
                    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
                    Route::post('/update/{id}', [ProductController::class, 'update'])->name('update');
                    Route::any('/delete/{id}', [ProductController::class, 'destroy'])->name('delete');

                });
            Route::as('transaction.')
                ->prefix("transaction")
                ->group(function () {
                        Route::get('/', [TransactionController::class, 'index'])->name('index');
                    Route::get('/report/{id}', [TransactionController::class, 'report'])->name('report');


                });
        });


});

require __DIR__.'/auth.php';
