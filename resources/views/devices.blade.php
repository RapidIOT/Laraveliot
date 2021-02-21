@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your Devices') }} <a class="btn btn-primary btn-sm float-right" href="/add_device">Add Device</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{session('message')}}
                    @foreach ($devicesArr as $device)
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Device Number</th>
                            <th scope="col">Name</th>
                            <th scope="col">Is Active</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                           
                            <tr>
                                <th scope="row">{{$device->id}}</th>
                                <td>{{$device->deviceNumber}}</td>
                                <td>{{$device->name}}</td>
                                <td>{{$device->is_active}}</td>
                                <td><a href="access_device_pins/{{$device->deviceNumber}}">Access</a> | <a href="edit_device/{{$device->id}}">Edit</a> | <a href="delete_device/{{$device->id}}">Delete</a></td>
                              </tr>


                              {{-- <tr>
                                <td colspan="5">
                                  @foreach ($device->pins as $pin)
                                  <div>

                                    {{$pin->id}} - 
                                  {{$pin->name}} - 

                                  <label class="switch">
                                    <input type="checkbox" name="pinStatus" id="pinStatus" value="1" {{($pin->pinStatus == 1 ? ' checked' : '')}}>
                                    <span class="slider round"></span>
                                  </label>
                                </div>
                                  @endforeach
                                </td>
                              </tr> --}}
                              
                        </tbody>
                      </table>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
