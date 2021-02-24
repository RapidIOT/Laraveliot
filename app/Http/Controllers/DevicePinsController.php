<?php

namespace App\Http\Controllers;

use App\DevicePins;
use Illuminate\Http\Request;

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
        // {"id":"1","_token":"b8dEmtdrxToY6JoWMFLfQleVshp0PXUZM3J3JSd4","pinStatus":"0"}
        // return $request;
        // return $devicePins;
        // $devicePins->pinStatus=$request->pinStatus;
        // $devicePins->save();
        // return $devicePins;
        
        $devicePins=DevicePins::find($request->id);
        if($devicePins){
            $devicePins->pinStatus=$request->pinStatus;
            // $devicePins->name = $request->name;
            // $devicePins->is_active = $request->is_active?'1':'0';
            $saved = $devicePins->save();
        if(!$saved){
            abort(500, 'Error');
        }else{
            
            $request->session()->flash('message', "Pin Updated");
            return response()->json(['success' => true,'message'=>'Pin Updated'],200);
            // return redirect('devices');
        }
        }else{
            return "Device Not Found";
        }

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

    public function getDevicePinsByDeviceId(DevicePins $devicePins, $id)
    {
        //
        return view('access_device_pins')->with('devicePins',DevicePins::where('deviceNumber',$id)->get());
    }


}
