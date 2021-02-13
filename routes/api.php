<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DeviceController;
use App\Http\Controllers\Api\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::post('login', 'AuthController@login');
// Route::post('logout', 'AuthController@logout');
// Route::post('refresh', 'AuthController@refresh');
// Route::post('me', 'AuthController@me');

Route::get('status', function(){ return "Api is working fine";});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::resource('device', 'DeviceController');
Route::post('login', [AuthController::class, 'login']); 
Route::group([
    'middleware' => 'auth:api',
    // 'prefix' => 'auth'
], function () {
    Route::get('device/{id}', [DeviceController::class, 'getDevicesByUserID']);
    Route::post('device/{id}', [DeviceController::class, 'updateDevicesByUserID']);
});