<?php
use App\Activities;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

function logActivity($deviceNumber="-",$userId="-",$details="-",$remarks="-",$activityType="-",$pinNumber="-",$pinStatus="-"){
    $activity=new Activities();
    $activity->deviceNumber = $deviceNumber;
    $activity->userId = Auth::id();
    $activity->activityById = Auth::id();
    $activity->details = $details;
    $activity->remarks = $remarks;
    $activity->activityType = $activityType;
    $activity->pinNumber = $pinNumber;
    $activity->pinStatus = $pinStatus;
    $saved = $activity->save();
    // if(!$saved){
    //     abort(500, 'Error');
    // }else{
    //     // $request->session()->flash('message', "new device created");
    //     return redirect('asd');
    // }
}
?>