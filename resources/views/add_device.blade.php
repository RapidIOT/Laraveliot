@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Devices') }} <a class="btn btn-primary btn-sm float-right" href="/devices">Back</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <form method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="deviceNumber">Device Number</label>
                          <input type="text" class="form-control" id="deviceNumber" name="deviceNumber" aria-describedby="deviceNumber" placeholder="Device Number" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
