<?php

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
    Route::name('home.') -> controller(HomeController::class) -> group(function() {
        Route::get ('', 'index') -> name('index');
        Route::get ('test', 'test') -> name('test');
    });

    Route::name('todo.') -> controller(TodoController::class) -> group(function() {
        Route::get('todo', 'index') -> name('index');
        Route::get('todo/add', 'add') -> name('add');
        Route::post('todo/store', 'store') -> name('store');
        Route::get('todo/show/{id}', 'show') -> name('show');
        Route::get('todo/edit/{id}', 'edit') -> name('edit');
        Route::put('todo/update', 'update') -> name('update');
        Route::delete('todo/delete', 'delete') -> name('delete');
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


// Route::get('/', function () {
//     return view('home');
// });

// Route::get ('/users', function() {
//     return 'this is the users page'; //res a string
// });

// // res an array
// Route::get('/foods', function() {
//     return ['sushi', 'sashimi'];
// });

// //res an obj
// Route::get('/aboutMe', function() {
//     return response() -> json([
//         'name' => 'test',
//         'email' => 'test@gmail.com'
//     ]); //res
// });

// // res ampther request = redirect
// Route::get('/something', function () {
//     return redirect('/foods');
// });