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
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', 'HomeController@home');

Route::group(['prefix' => 'manage-sayur'], function(){
    Route::get('/', 'SayurController@manageSayur');
    Route::get('/tambah-sayur', 'SayurController@tambahSayur');
    Route::post('/tambah-sayur/tambah', 'SayurController@save');
    Route::get('/search', 'SayurController@searchSayur');
    Route::get('/json', 'SayurController@sayurJson');
    Route::get('/detail-sayur/{id}', 'SayurController@detilSayur');
    Route::get('/edit-sayur/{id}', 'SayurController@editSayur');
    Route::post('/edit-sayur/simpan', 'SayurController@simpanPerbaharuan');
    Route::post('/delete/{id}', 'SayurController@delete');
});

Route::group(['prefix' => 'manage-transaksi'], function(){
    Route::get('/', 'TransaksiController@manageTransaksi');
    Route::get('/detail-transaksi/{id}', 'TransaksiController@detilTransaksi');
    Route::get('/belumbayar', 'TransaksiController@belumBayar');
    Route::get('/sudahbayar', 'TransaksiController@sudahBayar');
});

Route::group(['prefix' => 'manage-user'], function(){
    Route::get('/', 'UserController@manageUser');
    Route::get('/search', 'UserController@search');
    Route::post('/delete/{id}', 'UserController@delete');
    Route::get('/tambah-user', 'UserController@tambahUser');
    Route::post('/tambah-user/simpan', 'UserController@save');
});

Route::get('/chat', 'UserController@chatUser');


