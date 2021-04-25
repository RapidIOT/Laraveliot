<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Activities;
use Illuminate\Http\Request;
use App\UserDevices;
use App\User;
use Yajra\DataTables\Facades\DataTables;
class ActivitiesController extends Controller
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



    public function indexForAPI(Request $request)
    {
        $userid=$request->userid;
        $userDeviceIdsArr=UserDevices::where('userId',$userid)->groupBy('deviceNumber')->pluck('deviceNumber');
        //  $activities = Activities::where('activityById',$userid)->orwhereIn('deviceNumber',$userDeviceIdsArr)->get();
         $activities = Activities::select('deviceNumber','activityType','activityById','created_at')->where('activityById',$userid)->orwhereIn('deviceNumber',$userDeviceIdsArr);

        //  return datatables($activities)->make(true);
        //  return DataTables::of($activities)->editColumn('activityById',20000)->make(true);
        
         return DataTables::of($activities)->editColumn('activityById',function($data){
            $user = User::select('firstname')->where('id',$data->activityById)->first();
             return $user->firstname;
            })->editColumn('created_at',function($data){
                // return $data->created_at." - ".$data->created_at->diffForHumans();
                return $data->created_at;
            })->make(true);
    }


    public function samplepost(Request $request){
        return $request;
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
     * @param  \App\Activities  $activities
     * @return \Illuminate\Http\Response
     */
    public function show(Activities $activities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activities  $activities
     * @return \Illuminate\Http\Response
     */
    public function edit(Activities $activities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activities  $activities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activities $activities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activities  $activities
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activities $activities)
    {
        //
    }
}
