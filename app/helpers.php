<?php
use App\Activities;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

function logActivity($activityType="-",$deviceNumber="-",$deviceStatus="-",$pinId="-",$pinStatus="-",$details="-",$sharedControlWith="-"){
    $activity=new Activities();
    $activity->activityType = $activityType;
    $activity->activityById = Auth::id()?Auth::id():"0";
    $activity->deviceNumber = $deviceNumber;
    $activity->deviceStatus = $deviceStatus;
    $activity->activityType = $activityType;
    $activity->pinId = $pinId;
    $activity->pinStatus = $pinStatus;
    $activity->details = $details;
    $activity->sharedControlWith = $sharedControlWith;
    $saved = $activity->save();
    // if(!$saved){
    //     abort(500, 'Error');
    // }else{
    //     // $request->session()->flash('message', "new device created");
    //     return redirect('asd');
    // }
}
?>