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

Route::get('/', 'index@albumsController');
Route::get('/albums', 'index@albumsController');
Route::get('/albums/create', 'create@albumsController');
Route::get('/photos', 'index@photosController');
Route::get('/photos/create', 'create@photosController');
