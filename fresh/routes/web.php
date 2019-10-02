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

Route::get('/home', 'CropCondition@index')->name('home');
Route::get('/posts', 'CropController@index')->name('posts');
Route::post('/posts', 'CropController@addpost')->name('posts_add');

//->name('posts')

Route::get('/conditions', 'CropCondition@index')->name('conditions');
Route::post('/conditions', 'CropCondition@addcrop')->name('crop_add');
Route::post('/home', 'CropCondition@addcrop')->name('crop_add');





