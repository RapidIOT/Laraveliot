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
                          <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$device->name}}" id="name" name="name" aria-describedby="name" placeholder="Name">

                          @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

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


        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Share Device
                    <a class="btn btn-primary btn-sm float-right" href="/devices">Back</a>
                </div>

                

                <div class="card-body">
                    @if (session('shareDeviceStatusError'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('shareDeviceStatusError') }}
                        </div>
                    @endif
                    <form method="POST" action="/share_device">
                        @csrf
                        <input type="hidden" id="deviceNumber" name="deviceNumber" value="{{$device->deviceNumber}}">
                        <div class="form-group">
                          <label for="powerPins">Username/Email</label>
                          <input type="email" class="form-control @error('email') is-invalid @enderror" value="" id="email" name="email" aria-describedby="email" placeholder="Share with">
                          @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        
                          <div class="">
                              <button type="submit" class="btn btn-primary btn-block">Submit</button>
                          </div>
                      </form>

                </div>
            </div>    
        </div>





        <div class="col-md-4">
            <div class="card">
                <div class="card-header">You have shared this device With
                    <a class="btn btn-primary btn-sm float-right" href="/devices">Back</a>
                </div>
                <div class="card-body">
                    
                    <div class="alert alert-success" id="messageAlert" role="alert" style="display: none;"></div>

                    <ul class="list-group list-group-flush">
                        @foreach ($sharedUsersArr as $sharedUsersArray)
                        @foreach ($sharedUsersArray->userDetails as $sharedUser)
                        {{-- {{$sharedUser->id}} --}}
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0 py-2">{{$sharedUser->firstname}}
                            <label class="switch smallSwitch m-0">
                                <input type="checkbox" class="devicePin" name="pin_{{$sharedUsersArray->id}}" data-sharedUsersArrayId="{{$sharedUsersArray->id}}" id="pid_{{$sharedUsersArray->id}}" value="1" 
                                {{($sharedUsersArray->deleted_at == null ? ' checked' : '')}}
                                >
                                <span class="slider round"></span>
                              </label>
                        
                        </li>
                        @endforeach
                        @endforeach
                      </ul>



                      @if (count($sharedUsersArr)== 0)
                      <p>You didn't shared this device with any one.</p>
                      @endif
                </div>
            </div>    
        </div>



        
    </div>
</div>
@endsection








@section('footerJS')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.js"></script>
    <script>
        var _token = '{{csrf_token()}}';
        var _url = '{{url("/change_device_share")}}';
        // console.log(_url);

        $(document).ready(function(){
            $('.devicePin').change(function(e){
                let id=$(this).attr("data-sharedUsersArrayId");
                let finalURL= _url;
                let data={'id':id,'_token':_token};
                if ($(this).is(':checked')) {
                    data.shareStatus='1';
                }else{
                    data.shareStatus='0';
                }

                axios.post(finalURL,data).then((res)=>{
                    // console.log(res);
                    // console.log(res.data.message);
                    $("#messageAlert").show(10);
                    $("#messageAlert").html(res.data.message);
                    setTimeout(function(){
                        $("#messageAlert").hide(10);
                    },3000)

                }).catch((err)=>{
                    console.log(err);
                });
                
            });
        });
    </script>

    <style>
div#messageAlert {
    position: fixed;
    z-index: 9;
    right: 10px;
    top: 65px;
    width: 200px;
}
        </style>
@endsection