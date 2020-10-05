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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes(['verify' => true]);
Route::get('/', 'HomeController@index')->name('home');

    Route::group(['middleware' => 'admin'], function () {
    Route::get('/products', 'ProductController@index')->name('products');
    Route::get('/products/create', 'ProductController@create')->name('product.create');
    Route::post('/products', 'ProductController@store')->name('product.store');
    Route::get('/products/{product}/edit', 'ProductController@edit')->name('product.edit');
    Route::put('/products/{product}', 'ProductController@update')->name('product.update');
    Route::delete('/products/{product}', 'ProductController@destroy')->name('product.destroy');
});

Route::get('/products/{product}', 'ProductController@show')->name('product.show');


Route::post('cart/{product_id}', 'CartController@addProductToCart')->name('cart.add');
Route::get('/cart', 'CartController@show')->name('cart.show');
Route::delete('/cart/{product}', 'CartController@removeProductFromCart')->name('cart.product.destroy');

Route::get('/search', 'HomeController@index')->name('search');

Route::post('payment/paypal', 'PaymentController@payWithPaypal')->name('payment.paypal');

Route::get('payment/paypal/status', 'PaymentController@paypalCallback')->name('paypal.payment.status');

Route::get('payment/paypal/cancel', function (){
    return redirect(route('cart.show'));
})->name('paypal.payment.cancel');

Route::get('paypal-error', function (){
    dd('error happened while processing your payment');
})->name('paypal-payment.error');
