@extends('layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    
    <form method="POST" action="{{ route('reports.qfgenerate') }}">
            @csrf
            @method('post')
           
            <div class="form-group row">
                    <div class="col-lg-12">
                        <label for="dzongkhag"><strong>Dzongkhag:</strong></label>
                        <select name="dzongkhag" id="dzongkhag" class="form-control">
                        <option value="0">All</option>
                        @foreach(\App\Models\Dzongkhag::getDzongkhag(Auth::user()->id) as $dzongkhag)
                        <option value="{{ $dzongkhag->id }}">{{ $dzongkhag->Dzongkhag_Name }}</option>
                        @endforeach
                        </select>   
                </div>
                </div>
                <div class="form-group row">
                <div class="col-lg-6">
                    <input type="submit" class="btn btn-primary" value="submit"> 
                </div>
                </div>        
               
            </form>
           
    
    </div>
    
  

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Report </h6>
            
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
           
             
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            @isset($facility)       
            <thead>
                        <tr>
                            <th>sl</th>
                            <th> Facility Name </th>    
                            <th >Capacity</th>
                            <th>Dzongkhag</th>
                            <th >Gewog</th>
                           
                            
                        </tr>
                    </thead>
                    <tfoot>
                        
                    </tfoot>
                    <tbody>
                    @forelse($facility as $list)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $list->facility_name }}</td>
                        <td>{{ $list->capacity }}</td>
                      
                        <td>{{ str_replace(array('[',']','"'),'', App\Models\Checkin::dzongkhag($list->dzongkhag_id)->pluck('Dzongkhag_name')) }}</td>
                        
                        <td>{{ str_replace(array('[',']','"'),'', App\Models\Checkin::gewog($list->gewog_id)->pluck('gewog_name')) }}</td>
                        
                                               
                    @empty
                            <tr>
                                <td colspan="7">
                                    <span class="text-danger">No Data Available</span>
                                </td>
                            </tr>
                        @endforelse
       
                    </tbody>
              
            @endisset
            </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js"></script>

    <script>
    $(document).ready(function(){
        $('#dataTable').DataTable({
            dom: 'Bfrtip',
            responsive: true,     
            buttons: [
            {
                extend: 'excelHtml5',
                title: 'Quaraintine Facility Report'
            },
            {
                extend: 'print',
                title: 'Quaraintine Facility Report'
            }
        ]
    } );
      
    });
    </script>

@endsection
