<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Room1;
use Illuminate\Http\Request;

class Room1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Room1::all();
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
        $room1=new Room1();
        $room1->user_id = $request->user_id;
        $room1->power_points = $request->power_points;
        $room1->save();
        return $room1;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room1  $room1
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $Room1=Room1::find($id);
        return $Room1;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room1  $room1
     * @return \Illuminate\Http\Response
     */
    public function edit(Room1 $room1)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room1  $room1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $room1=Room1::find($id);
        if($room1){
            $room1->user_id = $request->user_id;
            $room1->power_points = $request->power_points;
            $room1->save();
        }else{
            return "Student Required Not Found";
        }
        //you can add custom message here
        return $room1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room1  $room1
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $room1=Room1::find($id);
        if($room1){
            $room1->delete();
        }else{
            return "Student Required Not Found";
        }
        //you can add custom message here
        return $room1;
    }






    public function getDetailsByUserID($user_id)
    {
        $device = Room1::where('user_id', $user_id)->first();
        return $device;
    }


    public function updateDetailsByUserID(Request $request, $user_id)
    {
        // return $user_id;
        $room1=Room1::where('user_id', $user_id)->first();
        if($room1){
            // $room1->user_id = $request->user_id;
            $room1->power_points = $request->power_points;
            $room1->save();
        }else{
            return "Student Required Not Found";
        }
        //you can add custom message here
        return $room1;
    }


}
