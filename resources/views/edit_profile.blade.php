@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reports') }} <a href="/profile" class="btn btn-primary btn-sm float-right">Profile</a></div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    

                    <form method="POST" action="/update_profile" enctype="multipart/form-data">
                      @csrf
                    <table class="table table-bordered">
                        <tbody>
                        @foreach ($profile as $pro)
                        <img src="{{ URL::to('/') }}/images/{{$pro->avatar}}" width="100" />
                        <tr>
                          <th>Profile Pic</th>
                          <td>
                            <input type="file" value="" id="avatar" name="avatar" class="form-control">
                            </td>
                        </tr>
                          <tr>
                            <th>First Name</th>
                            <td>
                              <input type="text" value="{{$pro->firstname}}" id="firstname" name="firstname" class="form-control @error('firstname') is-invalid @enderror">
                              @error('firstname')
                                  <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                              </td>
                          </tr>
                          <tr>
                            <th>Last Name</th>
                            <td>
                              <input type="text" value="{{$pro->lastname}}" id="lastname" name="lastname" class="form-control">
                              </td>
                          </tr>
                          <tr>
                            <th>Phone</th>
                            <td>
                              <input type="text" value="{{$pro->phone}}" id="phone" name="phone" class="form-control">
                              </td>
                          </tr>
                          <tr>
                            <th>City</th>
                            <td>
                              <input type="text" value="{{$pro->city}}" id="city" name="city" class="form-control">
                             </td>
                          </tr>
                          <tr>
                            <th>State</th>
                            <td>
                              <input type="text" value="{{$pro->state}}" id="state" name="state" class="form-control">
                              </td>
                          </tr>
                          <tr>
                            <th>Address</th>
                            <td>
                              <input type="text" value="{{$pro->address}}" id="address" name="address" class="form-control">
                              </td>
                          </tr>
                          <tr>
                            <th>Zip Code</th>
                            <td>
                              <input type="text" value="{{$pro->zipcode}}" id="zipcode" name="zipcode" class="form-control">
                             </td>
                          </tr>
                          <tr>
                            <th>Email</th>
                            <td>
                              <input type="text" value="{{$pro->email}}" id="email" name="email" class="form-control" readonly>
                              </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <div class="float-right">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
            </div>
        </div>
    </div>
</div>




@endsection
