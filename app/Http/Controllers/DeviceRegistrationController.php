<?php

namespace App\Http\Controllers;

use App\DeviceRegistration;

use App\Device;
use App\UserDevices;
use App\DevicePins;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeviceRegistrationController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userDeviceIdsArr=UserDevices::where('userId',Auth::id())->pluck('deviceNumber');
        $userSharedDeviceIdsArr=UserDevices::where('canAccessBy',Auth::id())->where('userId','!=',Auth::id())->pluck('deviceNumber');
        // return DeviceRegistration::whereIn('deviceNumber',$userDeviceIdsArr)->get();
        return view('devices')->with(['devicesArr'=>DeviceRegistration::whereIn('deviceNumber',$userDeviceIdsArr)->get(),'sharedDevicesArr'=>DeviceRegistration::whereIn('deviceNumber',$userSharedDeviceIdsArr)->get()]);
        
        // $devicesArr=array();
        // $userDeviceIdsArr=UserDevices::where('userId',Auth::id())->pluck('deviceNumber');
        // $userDevices= DeviceRegistration::whereIn('deviceNumber',$userDeviceIdsArr)->get();
        // foreach($userDevices as $userDevice){
        //     $userDevice->pins=DevicePins::where('deviceNumber',$userDevice->deviceNumber)->get(['id','name','pinStatus']);
        //     array_push($devicesArr,$userDevice);
        // }
        // // return $devicesArr;
        // return view('devices')->with('devicesArr',$devicesArr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('add_device');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // i need to create/store devices in database first
        $userId = Auth::id();
        $deviceNumber = $request->deviceNumber;
        $device = Device::where('deviceNumber',$deviceNumber)->first();
        if($device && !$device->is_active){
            // device found
            // device activate
            $device->is_active=1;
            $device->save();


            $deviceRegistration=new DeviceRegistration();
            $deviceRegistration->userId= $userId;
            $deviceRegistration->deviceNumber= $deviceNumber;
            $deviceRegistration->name=$device->name;
            $deviceRegistration->details=$device->details;
            $deviceRegistration->is_active=1;
            $deviceRegistration->save();

            // add user to device
            $userDevice = new UserDevices();
            $userDevice->userId= $userId;
            $userDevice->deviceNumber= $deviceNumber;
            $userDevice->canAccessBy= $userId;
            $userDevice->is_active=1;
            $userDevice->save();

            //create pins DevicePins
            for($i=0;$i<$device->pinsInDevice;$i++){
                $DevicePins = new DevicePins();
                $DevicePins->deviceNumber= $deviceNumber;
                $DevicePins->name= 'Pin '.($i+1);
                $DevicePins->pinNumber= $i+1;
                $DevicePins->pinStatus= 0;
                $DevicePins->is_active=1;
                $DevicePins->save();
            }

            $request->session()->flash('status', "New Device Added");
            return redirect('devices');

        }else{
            // no device found 
            $request->session()->flash('status', "Invalide Device, please check device Number");
            return redirect('add_device');
        }


        // $device=new Device();
        // $saved = $device->save();
        // if(!$saved){
        //     abort(500, 'Error');
        // }else{
        //     $request->session()->flash('message', "new device created");
        //     return redirect('devices');
        // }
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
        $device=DeviceRegistration::find($id);
        return $device;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device, $id)
    {
        //
        return view('edit_device')->with('device',DeviceRegistration::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $device=DeviceRegistration::find($request->id);
        if($device){
            $device->name = $request->name;
            $device->is_active = $request->is_active?'1':'0';
            $saved = $device->save();
        if(!$saved){
            abort(500, 'Error');
        }else{
            logActivity($activityType="Device Update",$deviceNumber=$device->deviceNumber,$deviceStatus=$device->is_active,$pinId="-",$pinStatus="-",$details="Device Details Updated",$sharedControlWith="0");
            // logActivity($device->deviceNumber,"userID","Device Details Updated","remarks","Edit Device");
            $request->session()->flash('message', "Device Updated");
            return redirect('devices');
        }
        }else{
            return "Device Not Found";
        }

        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $device=DeviceRegistration::find($id);
        if($device){
            $device->delete();
            $request->session()->flash('message', "Device Deleted");
            return redirect('devices');
        }else{
            // return view('404');
            abort(404);
        }
    }



}
