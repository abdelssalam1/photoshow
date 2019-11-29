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

Route::get('/', 'albumsController@index');
Route::get('/albums', 'albumsController@index');
Route::post('/albums/store', 'albumsController@store')->middleware('auth');
Route::get('/albums/create', 'albumsController@create')->middleware('auth');
Route::get('/albums/{id}', 'albumsController@show')->middleware('auth');
Route::delete('/albums/{id}', 'albumsController@destroy')->middleware('auth');
Route::get('/photos', 'photosController@index')->middleware('auth');
Route::get('/photos/create/{id}', 'photosController@create')->middleware('auth');
Route::post('/photos/store', 'photosController@store')->middleware('auth');
Route::get('/photos/{id}', 'photosController@show')->middleware('auth');
Route::delete('/photos/{id}', 'photosController@destroy')->middleware('auth');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/welcome', function(){return view('welcome');})->name('home');



