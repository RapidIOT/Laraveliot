<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Room1Controller;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('room1', 'Room1Controller');
// Route::get('device/{id}', [Room1Controller::class, 'getDetailsByUserID']);


Route::post('login', 'Api\AuthController@login'); 

Route::get('status', function(){ return "Api is working fine";});

Route::group([
    'middleware' => 'auth:api',
    // 'prefix' => 'auth'
], function () {
    Route::get('device/{id}', [Room1Controller::class, 'getDetailsByUserID']);
    Route::post('device/{id}', [Room1Controller::class, 'updateDetailsByUserID']);

    // Route::post('login', 'AuthController@login');
    // Route::post('logout', 'AuthController@logout');
    // Route::post('refresh', 'AuthController@refresh');
    // Route::post('me', 'AuthController@me');

});