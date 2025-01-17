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

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/items', 'ItemsController@index')->name('items_index');
// Route::post('/create_item', 'ItemsController@create_item');


Route::get('/', 'ForumController@index');
Route::post('comment/{id?}', 'ForumController@postComment');
Route::get('like/{id?}', 'ForumController@getLike');
