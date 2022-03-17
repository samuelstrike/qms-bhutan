@extends('layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        
        {{-- <div class="table-responsive">
            <table class="table table-bordered"  width="100%" cellspacing="0">
            <form method="POST" action="{{ route('reports.generate') }}">
            @csrf
            @method('post')
            <tr>
                <td>
                <label for="dzongkhag"><strong>Dzongkhag:</strong></label>
                    <select name="dzongkhag" id="dzongkhag" class="form-control">
                    <option value="0">All</option>
                    @foreach(\App\Models\Dzongkhag::all() as $dzongkhag)
                    <option value="{{ $dzongkhag->id }}">{{ $dzongkhag->Dzongkhag_Name }}</option>
                    @endforeach
                    </select>
                </td>
                <td>
                <label for="category"><strong>Category:</strong></label>
                <select name="category" id="category" class="form-control">
               
                <option value="0">Registered</option>
                <option value="0">Quaraintined</option>
                </select>
                </td>
                <td>
                    <label for="gender"><strong>Gender:</strong></label>
                    
                    <select name="gender" id="gender" class="form-control">
                    <option>All</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Others</option>
                    
                    </select> 
                </td>
                <td>
                    <label for="dzongkhag">From:</label>
                    <input type="date" class="form-control" name="f_date" value="{{date('Y-m-d')}}">
                </td>
                <td>
                    <label for="category"></label>To:</label>
                    <input type="date" class="form-control" name="t_date" value="{{date('Y-m-d')}}">  
                </td>
                <td>
                <input type="submit" class="btn btn-primary" value="submit"> 
                </td>
            </tr>
            </form>
            </table>
        </div> --}}
        <div class="row">
            <div class="card shadow">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                    role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Filter Data</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body">
                       <form action="{{ route('reports.generate') }}">
                        @csrf
                        @method('post')
                            <div class="row">
                                <div class="col-lg-2">
                                    <label for="dzongkhag"><strong>Dzongkhag:</strong></label>
                                    <select name="dzongkhag" id="dzongkhag" class="form-control">
                                        <option value="0">All</option>
                                        @foreach(\App\Models\Dzongkhag::getDzongkhag(Auth::user()->id) as $dzongkhag)
                                        <option value="{{ $dzongkhag->id }}">{{ $dzongkhag->Dzongkhag_Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <label for="category"><strong>Type:</strong></label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="0">Registered</option>
                                        <option value="C">Quaraintined</option>
                                        <option value="A">Currently in Quaraintine</option>
                                        <option value="P">New Registration</option>
                                        <option value="Re">Rejected</option>
                                        
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <label for="gender"><strong>Gender:</strong></label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option>All</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Others</option>
                                        </select> 
                                </div>
                                <div class="col-lg-2">
                                    <label for="gender"><strong>Category:</strong></label>
                                        <select name="cat" id="cat" class="form-control">
                                            <option>All</option>
                                            <option value='0'>Domestic</option>
                                            <option value='1'>International</option>
                                           
                                        </select> 
                                </div>    
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="f_date" class="form-control-label"><strong>From:</strong></label>
                                    <input type="date" class="form-control" name="f_date" value="{{date('Y-m-d')}}">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="t_date" class="form-control-label"><strong>To:</strong></label>
                                        <input type="date" class="form-control" name="t_date" value="{{date('Y-m-d')}}">
                                    </div> 
                                </div>
                            </div>
                            <div class="row justify-content-end mr-1">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
        
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
            @isset($reg)       
            <thead>
                        <tr>
                            <th>SL</th>
                            <th> CID </th>    
                            <th >Name</th>
                            <th>Contact No</th>
                            <th >From</th>
                            <th>To</th>
                            <th>Purpose</th>
                            
                        </tr>
                    </thead>
                    <tfoot>
                        
                    </tfoot>
                    <tbody>
                    @forelse($reg as $list)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $list->cid }}</td>
                        <td>{{ $list->name }}</td>
                        <td>{{ $list->phone_no }}</td>
                        <td>{{ str_replace(array('[',']','"'),'', App\Models\Checkin::gewog($list->from_gewog_id)->pluck('gewog_name')) }},
                            {{ str_replace(array('[',']','"'),'', App\Models\Checkin::dzongkhag($list->from_dzongkhag_id)->pluck('Dzongkhag_name')) }}</td>
                        
                        <td>{{ str_replace(array('[',']','"'),'', App\Models\Checkin::gewog($list->to_gewog_id)->pluck('gewog_name')) }},
                            {{ str_replace(array('[',']','"'),'', App\Models\Checkin::dzongkhag($list->to_dzongkhag_id)->pluck('Dzongkhag_name')) }}</td>
                        
                        <td>{{ str_replace(array('[',']','"'),'', App\Models\Purpose::getName($list->purpose_category_id)->pluck('category_name')) }}</td>
                        
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
                title: 'Quaraintine  Report'
            },
            {
                extend: 'print',
                title: 'Quaraintine  Report'
            }
        ]
    } );
      
    });
    </script>

@endsection
