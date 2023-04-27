<?php


use App\Http\Controllers\TodosController;
use Illuminate\Support\Facades\Route;



// Route::namespace('App\Http\Controllers')->group(function () {
//     Route::name('home.')->controller(HomeController::class)->group(function () {
//         Route::get('', 'index')->name('index');
//         Route::get('test', 'test')->name('test');
//     });

//     Route::name('product.')->prefix('product')->controller(ProductsController::class)->group(function () {
//         Route::get('', 'index')->name('index');
//         Route::get('about/{user}', 'about')->name('about');
//     });
// });
Route::namespace('App\Http\Controllers') -> group(function() {
    Route::middleware('auth') -> group(function() {
        Route::name('home.') -> controller(HomeController::class) -> group(function() {
            Route::get ('', 'index') -> name('index');
            Route::get ('test', 'test') -> name('test');
        });

        Route::name('logout.') -> controller(AuthController::class) -> group( function() {
            Route::post ('', 'logout') -> name('index');
        });
        Route::resource('todos', TodosController::class);
    });

    Route::name('login.') -> controller(AuthController::class) -> group( function() {
        Route::get ('login', 'index') -> name('index');
        Route::get ('register', 'register') -> name('register');
        Route::post ('registerPost', 'registerPost') -> name('registerPost');
        Route::post ('loginPost', 'loginPost') -> name('loginPost');
    });
});






// Route::get ('product', [App\Http\Controllers\ProductsController::class, 'index'])->name('product.index');




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
