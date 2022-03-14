@extends('layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        
        <div class="table-responsive">
            <table class="table table-bordered"  width="100%" cellspacing="0">
            <form method="POST" action="{{ route('reports.generate') }}">
            @csrf
            @method('post')
            <tr>
                <td>
                <label for="dzongkhag"><strong>Dzongkhag:</strong></label>
                    <select name="dzongkhag" id="dzongkhag" class="form-control">
                   
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
                <input type="submit" class="btn-primary" value="submit"> 
                </td>
            </tr>
            </form>
            </table>
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
                            <th>sl</th>
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
                        <td>{{ str_replace(array('[',']','"'),'', App\Models\Checkin::dzongkhag($list->from_dzongkhag_id)->pluck('Dzongkhag_name')) }}</td>
                        
                        <td>{{ str_replace(array('[',']','"'),'', App\Models\Checkin::dzongkhag($list->to_dzongkhag_id)->pluck('Dzongkhag_name')) }}</td>
                        
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
    <script>
    $(document).ready(function(){
        $('#dataTable').DataTable();
    });
    </script>

@endsection