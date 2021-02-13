<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Device::all();
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
        $device=new Device();
        $device->userId = $request->userId;
        $device->powerPins = $request->powerPins;
        $device->save();
        return $device;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $device=Device::find($id);
        return $device;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $device=Device::find($id);
        if($device){
            $device->userId = $request->userId;
            $device->powerPins = $request->powerPins;
            $device->save();
        }else{
            return "Student Required Not Found";
        }
        //you can add custom message here
        return $device;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $device=Device::find($id);
        if($device){
            $device->delete();
        }else{
            return "Student Required Not Found";
        }
        //you can add custom message here
        return $device;
    }



    public function getDevicesByUserID($userId)
    {
        $device = Device::where('userId', $userId)->first();
        // return $device;
        return response()->json(['data'=>$device],200); 
    }


    public function updateDevicesByUserID(Request $request, $userId)
    {
        // return $userId;
        $device=Device::where('userId', $userId)->first();
        if($device){
            // $room1->userId = $request->userId;
            $device->powerPins = $request->powerPins;
            $device->save();
        }else{
            return "Device Required Not Found";
        }
        //you can add custom message here
        return $device;
    }



}
