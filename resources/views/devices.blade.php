@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      
        {{-- {{}} --}}
      @if (count($devicesArr) > 0)
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your Devices') }} <a class="btn btn-primary btn-sm float-right" href="/add_device">Add Device</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('deviceUpdateMessage'))
                        <div class="alert alert-success" role="alert">
                          {{session('deviceUpdateMessage')}}
                        </div>
                    @endif

                    
                    @foreach ($devicesArr as $device)
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            {{-- <th scope="col">#</th> --}}
                            {{-- <th scope="col">Device Number</th> --}}
                            <th scope="col">Name</th>
                            <th scope="col">Device Stauts</th>
                            {{-- <th scope="col">Pin Status</th> --}}
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                           
                            <tr>
                                {{-- <th scope="row">{{$device->id}}</th> --}}
                                {{-- <td>{{$device->deviceNumber}}</td> --}}
                                <td>{{$device->name}}</td>
                                <td>
                                  {{-- {{$device->is_active}} --}}
                                  @if($device->is_active ==1) 
                                  <span class="greenCircle"></span>
                                  @else
                                  <span class="redCircle"></span>
                                  @endif
                                </td>
                                
                             

    
                                {{-- <td>
                                  @foreach ($device->pins as $pin)
                                    {{$pin->id}} - {{$pin->name}} - {{$pin->pinStatus}}

                                    @if($pin->pinStatus ==1) 
                                    <span class="greenCircle smallCircle"></span>
                                    @else
                                    <span class="redCircle smallCircle"></span>
                                    @endif


                                  <label class="switch">
                                    <input type="checkbox" name="pinStatus" id="pinStatus" value="1" {{($pin->pinStatus == 1 ? ' checked' : '')}}>
                                    <span class="slider round"></span>
                                  </label>
                                  @endforeach
                                </td> --}}




                                @if($device->is_active ==1)         
                                <td>
                                  <a href="access_device_pins/{{$device->deviceNumber}}">Access</a> | 
                                  <a href="edit_device/{{$device->id}}">Edit</a>
                                   {{-- | <a href="delete_device/{{$device->id}}">Delete</a> --}}
                                  </td>        
                            @else
                                  <td><a href="edit_device/{{$device->id}}">Edit</a></td>        
                            @endif



                              </tr>



                              
                        </tbody>
                      </table>
                    </div>
                    @endforeach


                    
                </div>
            </div>
        </div>
      @endif



        @if ($sharedDevicesArr->count() > 0)
        <div class="col-md-8 @if (count($devicesArr) > 0) mt-5 @endif">
          <div class="card">
              <div class="card-header">{{ __('Shared Devices') }} 
                {{-- <a class="btn btn-primary btn-sm float-right" href="/add_device">Add Device</a> --}}
              </div>

              <div class="card-body">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif

                  {{-- {{session('message')}} --}}
                  @foreach ($sharedDevicesArr as $sharedDevice)
                  <div class="table-responsive">
                  <table class="table table-bordered">
                      <thead>
                        <tr>
                          {{-- <th scope="col">#</th> --}}
                          {{-- <th scope="col">Device Number</th> --}}
                          <th scope="col">Name</th>
                          <th scope="col">Device Status</th>
                          <th scope="col">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                         
                          <tr>
                              {{-- <th scope="row">{{$sharedDevice->id}}</th> --}}
                              {{-- <td>{{$sharedDevice->deviceNumber}}</td> --}}
                              <td>{{$sharedDevice->name}}</td>
                              <td>
                                {{-- {{$sharedDevice->is_active}} --}}
                                @if($sharedDevice->is_active ==1) 
                                <span class="greenCircle"></span>
                                @else
                                <span class="redCircle"></span>
                                @endif
                              </td>

                              @if($sharedDevice->is_active ==1)         
                              <td><a href="access_device_pins/{{$sharedDevice->deviceNumber}}">Access</a></td>        
                              @else
                                    <td> </td>        
                              @endif
                              
                            </tr>  
                      </tbody>
                    </table>
                  </div>
                  @endforeach



                  
              </div>
          </div>
      </div>
      @endif


      @if ($sharedDevicesArr->count()== 0  && count($devicesArr) == 0)
      <div class="col-md-8 @if (count($devicesArr) > 0) mt-5 @endif">
        <div class="card">
            <div class="card-header">{{ __('No Devices') }} 
              {{-- <a class="btn btn-primary btn-sm float-right" href="/add_device">Add Device</a> --}}
            </div>
            <div class="card-body">
              <p>You don't have any devices.</p>
            </div>
          </div>
        </div>
      </div>
      @endif

    </div>
</div>
@endsection
