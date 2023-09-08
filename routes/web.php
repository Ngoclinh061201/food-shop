<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\ShopController;
use App\Http\Controllers\Client\WishlistController;
use App\Http\Controllers\Client\ProductSingleController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Client\AboutController;
use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Controller;

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
 // Route::post('/add/{product}', [WishlistController::class, 'addToFavorite'])->name('favorites.add');
// Route::post('/remove/{product}', [WishlistController::class, 'removeFromFavorite'])->name('favorites.remove');

Route::get('/', function () {
    return view('client.pages.home');
});
Route::get('/shop/{slug?}', [ShopController::class, 'show']);
Route::resource('/product-single', ProductSingleController::class);
Route::resource('/about', AboutController::class);
Route::resource('/blog', BlogController::class);
Route::resource('/contact', ContactController::class);

Route::middleware('auth')->group(function () {
    Route::prefix('/wishlist')->group(function() {
        Route::get('/', [WishlistController::class, 'index']);
        Route::get('/add/{id}', [WishlistController::class, 'create']);
    });
    Route::resource('/cart', CartController::class);
    Route::resource('/checkout', CheckoutController::class);
});

Route::middleware('auth.admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.pages.dashboard.index');
    });
    Route::get('/category', function () {
        return view('admin.pages.category.index');
    });
});


// })->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
