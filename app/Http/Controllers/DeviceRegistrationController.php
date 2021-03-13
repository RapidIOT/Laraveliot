<?php

namespace App\Http\Controllers;

use App\DeviceRegistration;

use App\Device;
use App\UserDevices;
use App\DevicePins;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\DevideShareEmail;
Use \Carbon\Carbon;

class DeviceRegistrationController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ////Without Pins
        $userDeviceIdsArr=UserDevices::where('userId',Auth::id())->pluck('deviceNumber');
        $userSharedDeviceIdsArr=UserDevices::where('canAccessBy',Auth::id())->where('userId','!=',Auth::id())->whereNull('deleted_at')->pluck('deviceNumber');
        return view('devices')->with(['devicesArr'=>DeviceRegistration::whereIn('deviceNumber',$userDeviceIdsArr)->get(),'sharedDevicesArr'=>DeviceRegistration::whereIn('deviceNumber',$userSharedDeviceIdsArr)->get()]);

        //with Pins
        // $userDeviceIdsArr=UserDevices::where('userId',Auth::id())->pluck('deviceNumber');
        // $userSharedDeviceIdsArr=UserDevices::where('canAccessBy',Auth::id())->where('userId','!=',Auth::id())->pluck('deviceNumber');
        // $devicesArr=array();
        // $userDevices= DeviceRegistration::whereIn('deviceNumber',$userDeviceIdsArr)->get();
        // foreach($userDevices as $userDevice){
        //     $userDevice->pins=DevicePins::where('deviceNumber',$userDevice->deviceNumber)->get(['id','name','pinStatus']);
        //     array_push($devicesArr,$userDevice);
        // }
        // // return $devicesArr;
        // // return view('devices')->with('devicesArr',$devicesArr);
        // return view('devices')->with(['devicesArr'=>$devicesArr,'sharedDevicesArr'=>DeviceRegistration::whereIn('deviceNumber',$userSharedDeviceIdsArr)->get()]);
        
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
        $device =  DeviceRegistration::find($id);
         $sharedUsers=UserDevices::where('deviceNumber',$device->deviceNumber)->where('canAccessBy','!=',Auth::id())->get(['canAccessBy','id','deleted_at']);
            $userDetails=array();
            foreach($sharedUsers as $sharedUser){
                // return $sharedUser->canAccessBy;
                // return User::where('id',$sharedUser->canAccessBy)->get();
                $sharedUser->userDetails = User::where('id',$sharedUser->canAccessBy)->get(['firstname']);
                array_push($userDetails,$sharedUser);
            }
            // return $userDetails;
        // return User::whereIn('id',$sharedUsers)->get();
        return view('edit_device')->with(['device'=>$device,'sharedUsersArr'=>$userDetails]);
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
        $validatedData = $request->validate([
            'name' => ['required']
        ]);

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
            $request->session()->flash('deviceUpdateMessage', "Device Updated");
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


    public function shareDeviceWithEmail(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255']
        ]);
        $userId = Auth::id();
        $sharedBy =  Auth::user();
        $deviceNumber = $request->deviceNumber;
        
        $shareWith = User::where('email', '=', $request->email)->first();
        if ($shareWith === null) {
            return "no user found in users table";
        }else{
            // add user to device
            if(UserDevices::where('canAccessBy', '=', $shareWith->id)->first()){
                $request->session()->flash('shareDeviceStatusError', "You have already shared this device with ".$request->email);
                return redirect()->back();
            }else{
                $userDevice = new UserDevices();
                $userDevice->userId= $userId;
                $userDevice->deviceNumber= $deviceNumber;
                $userDevice->canAccessBy= $shareWith->id;
                $userDevice->is_active=1;
                $userDevice->save();
                Mail::to($request->email)->send(new DevideShareEmail($shareWith, $sharedBy));
                $request->session()->flash('status', "Device Shared");
                return redirect('devices');
            }
            
        }
        

    }



    
    public function changeDeviceShare(Request $request)
    {
        $userDevices=UserDevices::find($request->id);
        if($userDevices){
            $userDevices->deleted_at = $request->shareStatus==1?null:Carbon::now();;
            $saved = $userDevices->save();
        if(!$saved){
            abort(500, 'Error');
        }else{
            $request->session()->flash('message', "Sharing updated");
            return response()->json(['success' => true,'message'=>'Sharing updated'],200);
        }
        }else{
            return "Device Not Found";
        }
    }


}
