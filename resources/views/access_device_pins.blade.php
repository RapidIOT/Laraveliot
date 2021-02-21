@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Access Device Pins') }} <a class="btn btn-primary btn-sm float-right" href="/devices">Back</a></div>

                <div class="card-body">
                    {{-- @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif --}}


                    <div class="alert alert-success" id="messageAlert" role="alert" style="display: none;"></div>

                    <form method="POST" action="/update_device_pins">
                        @csrf
                    @foreach ($devicePins as $devicePin)
                    <div>
                    {{$devicePin->name}}
                    <label class="switch">
                        {{-- <input type="checkbox" class="devicePin" name="pin{{$devicePin->id}}" id="pid{{$devicePin->id}}" value="1" {{($devicePin->pinStatus == 1 ? ' checked' : '')}}> --}}
                        <input type="checkbox" class="devicePin" name="pin_{{$devicePin->id}}" data-pinId="{{$devicePin->id}}" id="pid_{{$devicePin->id}}" value="1" {{($devicePin->pinStatus == 1 ? ' checked' : '')}}>
                        <span class="slider round"></span>
                      </label>
                    </div>
                    @endforeach
                    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                </form>

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
        var _url = '{{url("/update_device_pins")}}';
        // console.log(_url);
        function update_device_pin_using_checkbox(){

        }
        $(document).ready(function(){
            $('.devicePin').change(function(e){
                let pinId=$(this).attr("data-pinId");
                let finalURL= _url+"/"+pinId;
                let data={'id':pinId,'_token':_token};
                if ($(this).is(':checked')) {
                    data.pinStatus='1';
                }else{
                    data.pinStatus='0';
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