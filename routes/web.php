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
    return view('welcome');
});



// Route::get('/category', function () {
//     return view('admin.category.create');
// });

Route::get('/index/test', function () {
    return view('test');
});



Auth::routes();


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', 'FrontProductListController@index');
Route::get('/product/{id}', 'FrontProductListController@show')->name('product.view');
Route::get('/category/{name}', 'FrontProductListController@allProduct')->name('product.list');

Route::get('subcategories/{id}', 'ProductController@loadSubcatogories');

Route::get('/addToCart/{product}','CartController@addToCart')->name('add.cart');


Route::get('/cart','CartController@showCart')->name('cart.show');

Route::post('/products/{product}','CartController@updateCart')->name('cart.update');

Route::post('/product/{product}','CartController@removeCart')->name('cart.remove');


Route::group(['prefix'=>'auth', 'middleware'=>['auth', 'isAdmin']],  function (){
   
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::resource('category', 'CategoryController');

    Route::resource('subcategory', 'SubcategoryController');

    Route::resource('test', 'TestController');

    Route::resource('product', 'ProductController');
    




});


