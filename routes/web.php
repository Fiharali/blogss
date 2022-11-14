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



Route::get('/blogs','BlogController@index')->name('blog')->middleware('auth');
Route::get('/blog/{id}','BlogController@show')->name('blog.show')->middleware('auth');
Route::get('/create/blog','BlogController@create')->name('blog.create')->middleware('auth');
Route::post('/store/blog','BlogController@store')->name('blog.store')->middleware('auth');
Route::get('/edit/blog/{title}','BlogController@edit')->name('blog.edit')->middleware('auth');
Route::put('/update/blog/{title}','BlogController@update')->name('blog.update')->middleware('auth');
Route::delete('/delete/blog/{title}','BlogController@destroy')->name('blog.delete')->middleware('auth');




Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');


