<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmbeddedApi\DevicePinsController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
// http://127.0.0.1:8000/embedded-api/device/
Route::group([
    'middleware' => 'embeddedauth',
    // 'middleware' => 'auth.basic',
    // 'prefix' => 'auth'
], function () {
    Route::get('status', function(){ return "Embedded Api is working fine";});

    Route::get('device/{deviceNumber}', [DevicePinsController::class, 'getDevicePinsByDeviceNumber']);
    Route::post('device/{deviceNumber}', [DevicePinsController::class, 'postDevicePinsByDeviceNumber']);

});