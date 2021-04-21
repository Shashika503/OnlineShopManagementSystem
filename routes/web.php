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

Route::get('/AddExpenses', function () {
    return view('Expense/add');
});

 Route::get('/Sales', function () {
     return view('Sales/addsales');
 });

Route::get('/Sales', function () {
    return view('Sales/viewsales');
});
//  Route::get('/Sales', function () {
//      return view('Sales/addsales');
//  });
//Route::get('/Sales', function () {
//     return view('Sales/updatesales');
// });

Route::get('/Products', function () {
    return view('Product/viewproduct');
});

//Manufacturing
Route::get('/Manufacturing1', function () {
    
    return view('Manufacturing/addRecipe');
});


Route:: get('/Manufacturing',function(){
    //We only return Recipe1 when saveing data but this view should appear other times aswell
    $data=App\Models\Recipe::all();
    return view('Manufacturing/Recipe')->with('Recipe1',$data); 
});
//this calls the store function in REcipeController 
Route:: post('/saveRecipe','RecipeController@store');

Route::get('/deleteRecipe/{id}','RecipeController@deleterecipe');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');






