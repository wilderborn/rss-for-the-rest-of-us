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

Auth::routes();
Route::get('logout', 'Auth\LoginController@getLogout');

Route::get('/', 'HomeController@index')->name('home');

Route::resource('feeds', 'FeedController');
Route::get('feeds/{feed}/show', 'FeedItemController@show')->name('feeds.items.show');
