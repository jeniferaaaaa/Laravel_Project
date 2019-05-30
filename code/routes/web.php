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

Route::get('/', function(){
    return view ('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/made', 'HomeController@made');
Route::post('/home/made', 'HomeController@made');
Route::post('/home/made/kazoku', 'HomeController@kazoku');
//管理申請
Route::get('/admin', 'HomeController@admin');
Route::post('/admin/complete', 'HomeController@complete');
//回答画面
Route::post('/home/answer','adminController@answer');
Route::post('/home/answer/complete','adminController@comp');