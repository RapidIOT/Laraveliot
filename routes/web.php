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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');


// 'prefix'=>'prefixURL'
Route::group(['middleware'=>['auth','verified']],function(){
    Route::get('/devices', 'DeviceRegistrationController@index')->name('devices');
    Route::get('/add_device', 'DeviceRegistrationController@create')->name('add_device');
    Route::post('/add_device', 'DeviceRegistrationController@store');
    Route::get('/edit_device/{id}', 'DeviceRegistrationController@edit')->name('edit_device');
    Route::post('/share_device', 'DeviceRegistrationController@shareDeviceWithEmail');
    Route::post('/change_device_share', 'DeviceRegistrationController@changeDeviceShare');
    Route::post('/update_device/{id}', 'DeviceRegistrationController@update');
    Route::get('/delete_device/{id}', 'DeviceRegistrationController@destroy')->name('delete_device'); 
    
    
    Route::get('/access_device_pins/{id}', 'DevicePinsController@getDevicePinsByDeviceId')->name('access_device_pins');    
    Route::post('/update_device_pins/{id}', 'DevicePinsController@update')->name('update_device_pins');    
   
   
    Route::get('/reports', 'ActivitiesController@index')->name('reports');    
    Route::get('/reports-web-api', 'ActivitiesController@indexForAPI');    


    Route::get('/profile', 'UserController@index')->name('profile');   
    Route::get('/edit_profile', 'UserController@edit')->name('edit_profile');   
    Route::post('/update_profile', 'UserController@update');   
    
    
});