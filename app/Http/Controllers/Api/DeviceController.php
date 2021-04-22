<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use App\Device;
use App\UserDevices;
use App\DeviceRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $userDeviceIdsArr=UserDevices::where('userId',Auth::id())->pluck('deviceNumber');
        $userSharedDeviceIdsArr=UserDevices::where('canAccessBy',Auth::id())->where('userId','!=',Auth::id())->whereNull('deleted_at')->pluck('deviceNumber');

        $devicesArr = DeviceRegistration::whereIn('deviceNumber',$userDeviceIdsArr)->get();
        $sharedDevicesArr = DeviceRegistration::whereIn('deviceNumber',$userSharedDeviceIdsArr)->get();
        
        if(count($devicesArr)!=0 || count($sharedDevicesArr)!=0){
            $devices = array(
                "devicesArr"=>$devicesArr,
                "sharedDevicesArr" =>$sharedDevicesArr
            );

            return response()->json(['success' => true,'data'=>$devices],200); 
        }else{
            $json = [
                'success' => false,
                'error' => [
                    'message' => "No Devices Found",
                ],
            ];
            return response()->json($json, 401);
        }
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
        $device=Device::find($id);
        if($device){
            $device->delete();
        }else{
            return "Student Required Not Found";
        }
        //you can add custom message here
        return $device;
    }


}
