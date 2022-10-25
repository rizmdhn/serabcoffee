<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;

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
    return view('home',[
        "title"=> "Serab Coffee",
        "image"=> "IMG_7120.jpeg",
        "logo"=> "Serab's Coffee.png"
    ]);
});

Route::get('/about', function () {
    return view('about',[
        "title"=> "About Serab Coffee!",
        "image"=> "9. filosofi logo 1 (2).jpg",
        "logo"=> "Serab's Coffee.png"
    ]);
})->name('home.about');

Route::get('/product', function () {
    $products = Product::all();
    return view('product',[
        "title"=> "Serabcoffee's Product!",

    ],compact('products','products'));
})->name('home.products');

Route::get('/product/coffee', function () {
    $products = Product::all();
    return view('Coffee',compact('products','products'));
});
Route::get('/product/lightbites', function () {
    $products = Product::all();
    return view('product',compact('products','products'));
});
Route::get('/product/maincourse', function () {
    $products = Product::all();
    return view('product',compact('products','products'));
});
Route::get('/product/non-coffee', function () {
    $products = Product::all();
    return view('non-coffee',compact('products','products'));
});

Route::get('cart', 'App\Http\Controllers\CartController@cartList')->name('cart.list');
Route::post('cart', 'App\Http\Controllers\CartController@addToCart')->name('cart.store');
Route::post('update-cart', 'App\Http\Controllers\CartController@updateCart')->name('cart.update');
Route::post('remove', 'App\Http\Controllers\CartController@removeCart')->name('cart.remove');
Route::post('clear', 'App\Http\Controllers\CartController@clearAllCart')->name('cart.clear');
Route::get('checkout', 'App\Http\Controllers\CartController@checkout')->name('cart.checkout');
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
