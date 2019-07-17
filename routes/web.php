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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/index', 'ImagePlaceHolderController@index')->name('index');
Route::get('/indexShow/{slug}', 'ImagePlaceHolderController@indexShow')->name('indexShow');

Route::resource('/placeholder', 'placeholderController')->middleware('auth');

Route::get('/{width?}/{height?}', [
		'as' => 'images.show',
		'uses' => 'ImagePlaceHolderController@show'
])->where(['width' => '[0-9]+', 'height' => '[0-9]+']);;
