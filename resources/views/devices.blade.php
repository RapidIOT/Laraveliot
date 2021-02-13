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
                    
                    <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Power Points</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($devicesArr as $device)
                            <tr>
                                <th scope="row">{{$device->id}}</th>
                                <td>{{$device->powerPins}}</td>
                                <td>{{$device->created_at}}</td>
                                <td>{{$device->updated_at}}</td>
                                <td><a href="edit_device/{{$device->id}}">Edit</a> | <a href="delete_device/{{$device->id}}">Delete</a></td>
                              </tr>
                            @endforeach
                          
                        </tbody>
                      </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
