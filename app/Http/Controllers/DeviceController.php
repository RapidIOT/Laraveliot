<?php

namespace App\Http\Controllers;

use App\Device;
use App\UserDevices;

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
        //
        // return Device::all();
        return view('devices')->with('devicesArr',Device::where('userId', Auth::id())->get());
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
        //
        $device=new Device();
        $device->userId = Auth::id();
        $device->powerPins = $request->powerPins;
        $saved = $device->save();
        if(!$saved){
            abort(500, 'Error');
        }else{
            $request->session()->flash('message', "new device created");
            return redirect('devices');
        }
        
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
    public function edit(Device $device, $id)
    {
        //
        return view('edit_device')->with('device',Device::find($id));
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
        //

        $device=Device::find($request->id);
        if($device){
            $device->powerPins = $request->powerPins;
            $saved = $device->save();
        if(!$saved){
            abort(500, 'Error');
        }else{
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
        $device=Device::find($id);
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
