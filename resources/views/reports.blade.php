@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reports') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    
                    

                    <table class="table table-bordered" id="reportsTable">
                        <thead>
                          <tr>
                            <th scope="col">Device Number</th>
                            <th scope="col">Activity By</th>
                            <th scope="col">Type</th>
                            <th scope="col">Date</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                          <tr>
                            <th scope="row">{{$report->deviceNumber}}</th>
                            <td>{{$report->activityById}}</td>
                            <td>{{$report->activityType}}</td>
                            <td>{{$report->created_at}}</td>
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

@section('footerJS')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js" defer></script>

<script>
  $(document).ready( function () {
    $('#reportsTable').DataTable();
  });
</script>
@endsection