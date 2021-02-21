@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }} <a href="/edit_profile" class="btn btn-primary btn-sm float-right">Edit Profile</a></div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <tbody>
                        @foreach ($profile as $pro)
                        <img src="{{ URL::to('/') }}/images/{{$pro->avatar}}" width="100" />
                          <tr>
                            <th>First Name</th>
                            <td>{{$pro->firstname}}</td>
                          </tr>
                          <tr>
                            <th>Last Name</th>
                            <td>{{$pro->lastname}}</td>
                          </tr>
                          <tr>
                            <th>Phone</th>
                            <td>{{$pro->phone}}</td>
                          </tr>
                          <tr>
                            <th>City</th>
                            <td>{{$pro->city}}</td>
                          </tr>
                          <tr>
                            <th>State</th>
                            <td>{{$pro->state}}</td>
                          </tr>
                          <tr>
                            <th>Address</th>
                            <td>{{$pro->address}}</td>
                          </tr>
                          <tr>
                            <th>Zip Code</th>
                            <td>{{$pro->zipcode}}</td>
                          </tr>
                          <tr>
                            <th>Email</th>
                            <td>{{$pro->email}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>

                </div>
            </div>
        </div>
    </div>
</div>




@endsection
