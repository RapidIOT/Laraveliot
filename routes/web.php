<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/devices', 'DeviceController@index')->name('devices');
Route::get('/add_device', 'DeviceController@create')->name('add_device');
Route::post('/add_device', 'DeviceController@store');
Route::get('/edit_device/{id}', 'DeviceController@edit')->name('edit_device');
Route::post('/update_device/{id}', 'DeviceController@update');
Route::get('/delete_device/{id}', 'DeviceController@destroy')->name('delete_device');
