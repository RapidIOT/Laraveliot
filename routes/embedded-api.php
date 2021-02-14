<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DeviceController;
use App\Http\Controllers\Api\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
Route::group([
    'middleware' => 'embeddedauth',
    // 'prefix' => 'auth'
], function () {
    Route::get('status', function(){ return "Embedded Api is working fine";});
    Route::get('device/{id}', [DeviceController::class, 'getDevicesByUserID']);
    Route::post('device/{id}', [DeviceController::class, 'updateDevicesByUserID']);
});