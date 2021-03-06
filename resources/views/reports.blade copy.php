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
                            {{-- @foreach ($reports as $report)
                          <tr>
                            <th scope="row">{{$report->deviceNumber?$report->deviceNumber:'--'}}</th>
                            <td>{{$report->activityById}}</td>
                            <td>{{$report->activityType}}</td>
                            <td>{{$report->created_at}}</td>
                          </tr>
                          @endforeach --}}

                         
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

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js" defer></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" defer></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" defer></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" defer></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js" defer></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js" defer></script>

<script>
  $(document).ready( function () {
    // $('#reportsTable').DataTable({
    //     dom: 'Bfrtip',
    //     buttons: [
    //         // 'copy', 'csv', 'excel', 'pdf', 'print'
    //         'excel', 'pdf', 'print'
    //     ]
    // });

    var userid="{{$userid}}";
    $('#reportsTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            // 'copy', 'csv', 'excel', 'pdf', 'print'
            'excel', 'pdf', 'print'
        ],
        processing:true,
        serverSide:true,
        ajax:"{{url('reports-web-api?userid=')}}"+userid,
        columns:[{data:"deviceNumber"},{data:"activityById"},{data:"activityType"},{data:"created_at"}],
        pageLength:3
    });



  });
</script>
@endsection