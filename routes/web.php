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
});

Route::get('/product', function () {
    $products = Product::all();
    return view('product',[
        "title"=> "Serabcoffee's Product!",
        
    ],compact('products','products'));    
});

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

Route::resource('products', 'App\Http\Controllers\ProductController');