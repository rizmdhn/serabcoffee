<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
Auth::routes();

Route::get('/', function () {
    return view('home',[
        "title"=> "Nahini Coffee",
        "image"=> "IMG_7120.jpeg",
        "logo"=> "Nahini's Coffee.png"
    ]);
});

Route::get('/cookie/set/{table_number}','App\Http\Controllers\CookieController@setCookie');
Route::get('/cookie/get','App\Http\Controllers\CookieController@getCookie');
Route::get('/about', function () {
    return view('about',[
        "title"=> "About Nahini Coffee!",
        "image"=> "9. filosofi logo 1 (2).jpg",
        "logo"=> "Nahini's Coffee.png"
    ]);
})->name('home.about');

Route::get('/product', function (Request $request) {
    $products = Product::with('category_name')->get();
    $table_number = $request->cookie('table_number');
    return view('product',[
        "title"=> "Nahini's Product!",
    ],compact('products','table_number'));
})->name('home.products');
Route::get('/product/coffee', function () {
    $products = Product::with('category_name')->get();
    return view('Coffee',compact('products','products'));
});
Route::get('/product/lightbites', function () {
    $products = Product::with('category_name')->get();
    return view('product',compact('products','products'));
});
Route::get('/product/main-course', function () {
    $products = Product::with('category_name')->get();
    return view('MainCourse',compact('products','products'));
});
Route::get('/product/non-coffee', function () {
    $products = Product::with('category_name')->get();
    return view('non-coffee',compact('products','products'));
});

Route::get('cart', 'App\Http\Controllers\CartController@cartList')->name('cart.list');
Route::post('cart', 'App\Http\Controllers\CartController@addToCart')->name('cart.store');
Route::post('update-cart', 'App\Http\Controllers\CartController@updateCart')->name('cart.update');
Route::post('remove', 'App\Http\Controllers\CartController@removeCart')->name('cart.remove');
Route::post('clear', 'App\Http\Controllers\CartController@clearAllCart')->name('cart.clear');
Route::post('checkout', 'App\Http\Controllers\CartController@checkout')->name('cart.checkout');
Route::group(['middleware'=>'auth'], function(){
    Route::get('/backoffice', 'App\Http\Controllers\Backoffice@index')->name('backoffice.index');
    Route::post('/order/done/{id}', 'App\Http\Controllers\CartController@doneorder')->name('backoffice.order.done');
    Route::get('/backoffice/products', 'App\Http\Controllers\ProductController@index')->name('backofficeproducts.index');
    Route::get('/backoffice/products/create', 'App\Http\Controllers\ProductController@create')->name('backofficeproducts.create');
    Route::post('/backoffice/products/create', 'App\Http\Controllers\ProductController@store')->name('backofficeproducts.store');
    Route::get('/backoffice/products/{id}', 'App\Http\Controllers\ProductController@show')->name('backofficeproducts.show');
    Route::get('backoffice/products/{id}/edit', 'App\Http\Controllers\ProductController@edit')->name('backofficeproducts.edit');
    Route::put('backoffice/products/{id}/edit', 'App\Http\Controllers\ProductController@update')->name('backofficeproducts.update');
    Route::delete('backoffice/products/{id}', 'App\Http\Controllers\ProductController@destroy')->name('backofficeproducts.destroy');
    Route::get('/backoffice/tables', 'App\Http\Controllers\TableController@index')->name('backoffice.table.index');
    Route::get('/backoffice/tables/create', 'App\Http\Controllers\TableController@create')->name('backoffice.table.create');
    Route::post('/backoffice/tables/create', 'App\Http\Controllers\TableController@store')->name('backoffice.table.store');
    Route::get('/backoffice/tables/{id}', 'App\Http\Controllers\TableController@show')->name('backoffice.table.show');
    Route::get('backoffice/tables/{id}/edit', 'App\Http\Controllers\TableController@edit')->name('backoffice.table.edit');
    Route::put('backoffice/tables/{id}/edit', 'App\Http\Controllers\TableController@update')->name('backoffice.table.update');
    Route::delete('backoffice/tables/{id}', 'App\Http\Controllers\TableController@destroy')->name('backoffice.table.destroy');
});

