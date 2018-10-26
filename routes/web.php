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

Route::get('blog/list', 'BlogController@list');
Route::post('blog/add', 'BlogController@add');
Route::get('blog/edit', 'BlogController@edit');
Route::get('blog/delete/{id}', 'BlogController@delete');


Route::get('category/list', 'CategoryController@list');
Route::post('category/add', 'CategoryController@add');
Route::post('category/edit', 'CategoryController@edit');

