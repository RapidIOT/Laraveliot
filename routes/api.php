<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DeviceController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ActivitiesController;
// Route::post('login', 'AuthController@login');
// Route::post('logout', 'AuthController@logout');
// Route::post('refresh', 'AuthController@refresh');
// Route::post('me', 'AuthController@me');
Route::get('status', function(){ return "Api is working fine";});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('register', [AuthController::class, "appUserRegistration"]);
Route::post('login', [AuthController::class, 'login']); 
Route::post('passwordReset', [AuthController::class, 'login']); 


Route::group([
    'middleware' => 'auth:api',
    // 'prefix' => 'auth'
], function () {
    Route::get('devices', [DeviceController::class, 'index']);
    Route::get('/reports', [ActivitiesController::class, 'indexForAPI']);





    ////Bello are we routes
    // Route::get('/devices', 'DeviceRegistrationController@index')->name('devices');---------Done
    // Route::get('/add_device', 'DeviceRegistrationController@create')->name('add_device');
    // Route::post('/add_device', 'DeviceRegistrationController@store');
    // Route::get('/edit_device/{id}', 'DeviceRegistrationController@edit')->name('edit_device');
    // Route::post('/share_device', 'DeviceRegistrationController@shareDeviceWithEmail');
    // Route::post('/change_device_share', 'DeviceRegistrationController@changeDeviceShare');
    // Route::post('/update_device/{id}', 'DeviceRegistrationController@update');
    // Route::get('/delete_device/{id}', 'DeviceRegistrationController@destroy')->name('delete_device'); 
    
    
    // Route::get('/access_device_pins/{id}', 'DevicePinsController@getDevicePinsByDeviceId')->name('access_device_pins');    
    // Route::post('/update_device_pins/{id}', 'DevicePinsController@update')->name('update_device_pins');    
   
   
    // Route::get('/reports', 'ActivitiesController@index')->name('reports'); ---------Done   
    // Route::get('/reports-web-api', 'ActivitiesController@indexForAPI');    


    // Route::get('/profile', 'UserController@index')->name('profile');   
    // Route::get('/edit_profile', 'UserController@edit')->name('edit_profile');   
    // Route::post('/update_profile', 'UserController@update'); 

    
});