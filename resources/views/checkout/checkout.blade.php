@extends('layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Allocate Quaraintine Facility</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>
    @if ($message=Session::get('flash_message')) 
        
        <div class="alert alert-primary alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{$message}}</strong> 
        
        </div>
    @endif

    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Allocate Quaraintine Facility</h6>
            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    @foreach($check_out as $checkout)
                    @if($loop->first)
                    <thead> 
                       <tr>
                           <th>CID</th>
                           <th colspan="2">Name</th>
                           <th>Gender</th>
                          
                           <th colspan="2">Occupation</th>
                           <th colspan="2">Vaccination Status</th>
                       </tr>
                    </thead>
                    @endif
                    <tbody>        
                      
                      <tr>
                          <td>{{ $checkout->cid }}</td>
                          
                          <td colspan="2">{{ $checkout->name }} </td>
                          <td>{{ $checkout->gender }} </td>
                         
                          
                          <td colspan="2"> {{ $checkout->occupation_name }} </td>
                          <td colspan="2">{{ $checkout->dose_name }} </td>
                      </tr>
                  </tbody>
                  @if ($loop->last)
                      <thead>  
                        <tr>
                           <th colspan="2">Travel Mode</th>
                           <th colspan="2">Purpose</th>
                           <th colspan="2">Expected Travel Date </th>
                           <th colspan="2">Present Address</th>
                          
                       </tr>
                       </thead>
                        <tbody>
                        <tr>
                            <td colspan="2">{{ $checkout->travel_mode }}</td>
                            
                            <td colspan="2"> {{ $checkout->category_name }} </td>
                            <td colspan="2"> {{ $checkout->expected_date }} </td>
                            <td colspan="2"> {{ $checkout->present_address }}</td>
                        </tr>
                        </tbody>
                        <thead>
                        <tr>
                            <th colspan="2">From Dzongkhag</th>
                            <th colspan="2">From Gewog</th>   
                            <th colspan="2">To Dzongkhag</th>
                            <th colspan="2">To Gewog</th>
                            
                        </tr>
                       </thead> 
                        <tbody>                        
                        <tr>
                            <td colspan="2"> {{ $checkout->Dzongkhag_Name }} </td>
                            <td colspan="2"> {{ $checkout->gewog_name }} </td>
                            <td colspan="2"> {{ $checkout->Dzongkhag_Name }} </td>
                            <td colspan="2"> {{ $checkout->gewog_name }} </td>
                            
                        </tr>
                        </tbody>
                        <thead>
                        <tr>
                            <th colspan="2">Phone Number</th>
                            <th colspan="4">Remarks</th>
                            <th colspan="2">Supporting Document </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="2">{{ $checkout->phone_no }}</td>
                            <td colspan="4">
                                {{ $checkout->travel_details }} 
                            </td>
                       
                            <td colspan="2"> @if($checkout->file_name!="")
                                <a href="{{ route('downloadFile',$checkout->file_name) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> {{ $checkout->file_name }} </a>   

                                              @endif
                            </td>
                        </tr>
                        </tbody>
                    @endif
                   @endforeach
                </table>
            </div>

    <div class="row">
    <div class="col-md-12">
            <form action="{{ route('checkout') }}" method="POST" enctype="multipart/form-data">
                @csrf
            
            <div class="form-group row">
                        <div class="col-sm-2">
                            <label for="test"><strong>Test Type:</strong></label>
                            <select name="test" id="test" class="form-control">
                                <option>Antigen</option>
                                <option>RT-PCR</option>
                                <option>Both</option>
                            </select>
                        </div>
                        
                        <div class="col-sm-2">
                            <label for="result"><strong>Result:</strong></label>
                            <select name="result" id="result" class="form-control">
                            <option>Negative</option>    
                            <option>Positive</option>
                            
                            </select>                          
                        </div>
                        <div class="col-sm-2">
                            <label for="c_action"><strong>Action:</strong></label>
                            <select name="select_action" id="select_action" class="form-control">
                                <option>Checkout</option>
                                <option>Isolate</option>
                            </select>                          
                        </div>
                        <div class="col-sm-2">
                            <label for="checkout"><strong>Checkout Date:</strong></label>
                            <input type="date" name="checkout_dt" id="checkout_dt">
                        </div>
                        <div class="col-sm-2">
                            <label for="remarks"><strong>Remarks if any:</strong></label>
                            <textarea class="form-control" name="remarks" id="remarks"></textarea>
                        </div>
                        
                       
                        <input type="hidden" name="reg_id" id="reg_id" value="{{ $checkout->registration_id }}">
                    </div>
                    
                    <div class="form-group row" id="input-submit" >
                        
                        <div class="col-sm-4">
                        <input type="submit" class="btn-primary" value="submit">                        
                        </div>
                    </div>
                    
                    
                </form>
            </div>
    </div>

        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>

</script>


@endsection
