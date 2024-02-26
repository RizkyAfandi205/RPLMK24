<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

// Homepage
Route::get('/', 'App\Http\Controllers\AlbumController@index');
// Upload Action
Route::post('/upload/data', 'App\Http\Controllers\AlbumController@upload');
// Kategori Page
Route::get('/kategori/{kategori}', 'App\Http\Controllers\AlbumController@kategori');
// MyPost Page
Route::get('/my_posts', 'App\Http\Controllers\AlbumController@me');
// delete Page
Route::get('/edit/{album_id}', 'App\Http\Controllers\AlbumController@edit_page');
// Edit Action
Route::post('/edit/data', 'App\Http\Controllers\AlbumController@edit');
// Delete Action
Route::get('/delete/{album_id}', 'App\Http\Controllers\AlbumController@delete');
// Page Orang Lain
Route::get('/{username}', 'App\Http\Controllers\AlbumController@user');