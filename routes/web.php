<?php

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

Auth::routes();
//Home & Products
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/products/{id}', 'ProductController@getProductCatergory')->name('products.getProductCatergory');

//ShoppingCart
Route::get('/shopping-cart', 'ProductController@getCart')->name('products.shoppingCart');
Route::get('/shopping-cart/remove/{id}', 'ProductController@getRemoveFromCart')->name('products.shoppingCartremove');
Route::get('/shopping-cart/reduce/{id}', 'ProductController@getReduceFromCart')->name('products.shoppingCartreduce');
Route::get('/shopping-cart/increase/{id}', 'ProductController@getIncreaseFromCart')->name('products.shoppingCartincrease');
Route::get('/addToCart/{id}', 'ProductController@getAddToCart')->name('products.addToCart');


//Checkout
Route::get('/checkout', 'OrderController@getCheckout')->name('getCheckout');
Route::post('/checkout/succes', 'OrderController@postCheckout')->name('postCheckout');

//Orders
Route::get('/order', 'OrderController@index')->name('order.index');
Route::post('/checkout/succes', 'OrderController@create')->name('createOrder');