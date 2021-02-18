<?php

namespace App\Http\Controllers\EmbeddedApi;
use App\Http\Controllers\Controller;

use App\DevicePins;
use App\UserDevices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DevicePinsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DevicePins  $devicePins
     * @return \Illuminate\Http\Response
     */
    public function show(DevicePins $devicePins)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DevicePins  $devicePins
     * @return \Illuminate\Http\Response
     */
    public function edit(DevicePins $devicePins)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DevicePins  $devicePins
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DevicePins $devicePins)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DevicePins  $devicePins
     * @return \Illuminate\Http\Response
     */
    public function destroy(DevicePins $devicePins)
    {
        //
    }


    

    public function getDevicePinsByDeviceNumber(DevicePins $devicePins, $deviceNumber){
         $userdeviceNumbersArr=UserDevices::where([['userId',Auth::id()],['is_active',1]])->pluck('deviceNumber')->toArray();
        if (in_array($deviceNumber,$userdeviceNumbersArr)) {
            // return DevicePins::where('deviceId',$deviceId)->get(['name', 'pinNumber', 'pinStatus']);
            // return DevicePins::where('deviceId',$deviceId)->pluck('pinStatus');
            $json = [
                // 'success' => true,
                // 'data' => [
                //     'powerPins' => implode(DevicePins::where('deviceNumber',$deviceNumber)->pluck('pinStatus')->toArray()),
                // ],

                'pins' => implode(DevicePins::where('deviceNumber',$deviceNumber)->pluck('pinStatus')->toArray())
            ];
            return response()->json($json, 200);
        }else{
            $json = [
                // 'success' => false,
                // 'error' => [
                //     'code' => '',
                //     'message' => 'No Device Found with This ID / You Don\'t have access to this device',
                // ],
                'success' => false,
                'msg' => 'No Device Found with This ID / You Don\'t have access to this device'
            ];
            return response()->json($json, 401);
        }
    }



    public function postDevicePinsByDeviceNumber(Request $request, DevicePins $devicePins, $deviceNumber){
        // return str_split($request->powerPins,1);
            // return $deviceNumber;
        $inputData=str_split($request->pins,1);
        $userdeviceNumbersArr=UserDevices::where([['userId',Auth::id()],['is_active',1]])->pluck('deviceNumber')->toArray();
        if (in_array($deviceNumber,$userdeviceNumbersArr)) {
            $deviceRecordsArr = DevicePins::where('deviceNumber',$deviceNumber)->pluck('id')->toArray();
            foreach ($deviceRecordsArr as $key=>$deviceRecord) {
                $device=DevicePins::where('id', $deviceRecord)->first();
                // if($device){
                    $device->pinStatus = $inputData[$key];
                    $device->save();
                // }
            }
            $json = [
                // 'success' => true,
                // 'data' => [
                //     'message' => "Pins Updated to: ".$request->powerPins,
                // ],
                'msg' => "Updated"
            ];
            return response()->json($json, 200);
        }else{
            $json = [
                // 'success' => false,
                // 'error' => [
                //     'code' => '',
                //     'message' => 'No Device Found with This ID / You Don\'t have access to this device',
                // ],
                'success' => false,
                'msg' => 'No Device Found with This ID / You Don\'t have access to this device'
            ];
            return response()->json($json, 401);
        }



    }

}
