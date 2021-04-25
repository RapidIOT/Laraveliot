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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login', [AuthController::class, 'login']); 

Route::get('/reports', [ActivitiesController::class, 'indexForAPI']);

Route::post('/samplepost', [ActivitiesController::class, 'samplepost']);

Route::group([
    'middleware' => 'auth:api',
    // 'prefix' => 'auth'
], function () {
    Route::get('devices', [DeviceController::class, 'index']);
});