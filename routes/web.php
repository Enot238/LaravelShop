<?php

use Illuminate\Support\Facades\Route;
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
Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);

Route::get('/logout', 'Auth\LoginController@logout')->name('get-logout');


Route::group(['middleware'=>'auth'],function (){
    Route::group(['middleware' => 'auth.admin', 'prefix' => 'Admin'],function(){
        Route::resource('categories', '\App\Http\Controllers\Admin\CategoryController');
        Route::resource('products', '\App\Http\Controllers\Admin\ProductController');
        Route::get('/orders', '\App\Http\Controllers\HomeController@index')->name('home');
    });

});


Route::get('/', '\App\Http\Controllers\Main@index' )->name('index');



Route::group([
    'prefix' => 'basket'
], function (){
    Route::post('/add/{id}','\App\Http\Controllers\BasketController@basketAdd' )->name('basket-add');
    Route::group(['middleware' => 'basket_not_empty'], function (){
        Route::get('/', '\App\Http\Controllers\BasketController@basket' )->name('basket');
        Route::get('/place', '\App\Http\Controllers\BasketController@basketPlace' )->name('basket-place');
        Route::post('/remove/{id}','\App\Http\Controllers\BasketController@basketRemove' )->name('basket-remove');
        Route::post('/place', '\App\Http\Controllers\BasketController@basketConfirm' )->name('basket-confirm');
    });


});

Route::get('/search', '\App\Http\Controllers\ProductController@search')->name('search');

Route::get('/categories', '\App\Http\Controllers\Main@categories' )->name('categories');
Route::get('/category/{category}', '\App\Http\Controllers\Main@category' )->name('category');
Route::get('/prod/{category}/{product?}', '\App\Http\Controllers\Main@product' )->name('product');

