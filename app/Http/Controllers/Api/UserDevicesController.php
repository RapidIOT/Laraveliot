<?php

namespace App\Http\Controllers\Api;

use App\Device;
use App\Http\Controllers\Controller;

use App\UserDevices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDevicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userDeviceIdsArr=UserDevices::where('userId',Auth::id())->pluck('deviceId');
        return Device::whereIn('id',$userDeviceIdsArr)->get();
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
     * @param  \App\UserDevices  $userDevices
     * @return \Illuminate\Http\Response
     */
    public function show(UserDevices $userDevices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserDevices  $userDevices
     * @return \Illuminate\Http\Response
     */
    public function edit(UserDevices $userDevices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserDevices  $userDevices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserDevices $userDevices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserDevices  $userDevices
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDevices $userDevices)
    {
        //
    }
}
