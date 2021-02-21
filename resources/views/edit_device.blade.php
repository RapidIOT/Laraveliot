@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Edit <strong>{{$device->deviceNumber}}</strong> <a class="btn btn-primary btn-sm float-right" href="/devices">Back</a></div>

                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{$device->details}}

                    <hr />

                    <form method="POST" action="/update_device/{{$device->id}}">
                        @csrf
                        <div class="form-group">
                          <label for="powerPins">Name</label>
                          <input type="text" class="form-control" value="{{$device->name}}" id="name" name="name" aria-describedby="name" placeholder="Name" required>
                        </div>

                        <div class="form-group">
                            <label for="powerPins">Active/Inactive</label> <br/>
                            <label class="switch">
                                <input type="checkbox" name="is_active" id="is_active" value="1" {{($device->is_active == 1 ? ' checked' : '')}}>
                                <span class="slider round"></span>
                              </label>
                          </div>
                          <div class="">
                              <button type="submit" class="btn btn-primary btn-block">Submit</button>
                          </div>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
