<?php

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

Route::get('/', function () {
    return view('home');
});


Route::get('/Expenses', function () {
    return view('Expense/view');
});

 Route::get('/Sales', function () {
     return view('Sales/addsales');
 });
<<<<<<< HEAD
 
Route::get('/Sales', function () {
    return view('Sales/updatesales');
});

=======

Route::get('/Sales', function () {
    return view('Sales/updatesales');
});
>>>>>>> 9980bf0415f889d5438a03716c262972338fd752

Route::get('/Products', function () {
    return view('Product/updateproduct');
});

Route::get('/Manufacturing', function () {
    return view('Manufacturing/addRecipe');
});

Route::get('/Manufacturing', function () {
    return view('Manufacturing/addRecipe');
});


Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');






