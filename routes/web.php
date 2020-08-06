<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('Book')->group(function (){
    Route::get('/','BookController@index')->name('books.index');
    Route::get('/create','BookController@create')->name('books.create');
    Route::post('/create','BookController@store')->name('books.store');
    Route::get('{id}/edit','BookController@edit')->name('books.edit');
    Route::post('{id}/edit','BookController@update')->name('books.update');
    Route::get('{id}/delete','BookController@destroy')->name('books.delete');
    Route::post('/search','BookController@searchBook')->name('books.search');


});
