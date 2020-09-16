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

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login')->middleware('guest');
Route::post('login', 'Auth\LoginController@login')->name('login.attempt')->middleware('guest');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


Route::get('/home', 'ArticlesController@articleList')->name('home');

Route::group(['prefix' => 'articles', 'middleware'=>'auth'], function (){
    Route::get('/', 'ArticlesController@index')->name('list');
    Route::get('/create', 'ArticlesController@create')->name('create');
    Route::post('/', 'ArticlesController@store')->name('store');
    Route::put('/{id}', 'ArticlesController@update')->name('update');
    Route::get('/{id}', 'ArticlesController@show')->name('show');
    Route::get('/details/{id}', 'ArticlesController@details')->name('details');
    Route::delete('/{id}', 'ArticlesController@delete')->name('delete');
});

