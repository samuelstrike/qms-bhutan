@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
          <h5><b>Checkout from Quarantine Facility</b></h5>
        </div>
       <div class="card-body">
       <table class="table table-bordered table-striped text-center mb-0">
                        
                   
                        <tbody>
                       
                            
                @forelse($check_out as $checkout)
                      
                        <tr>
                           <th>CID</th>
                           <th>Name</th>
                           <th>Gender</th>
                           <th>Phone Number</th>
                           <th>Occupation</th>
                           <th>Vaccination Status</th>
                       </tr>
                      
                        <tr>
                            <td>{{ $checkout->cid }}</td>
                            
                            <td>{{ $checkout->name }} </td>
                            <td>{{ $checkout->gender }} </td>
                            <td>{{ $checkout->phone_no }}</td>
                            
                            <td> {{ $checkout->phone_no }} </td>
                            <td>{{ $checkout->dose_name }} </td>
                        </tr>
                        
              
    
                        <tr>
                           <th colspan="2">Travel Mode</th>
                           <th colspan="2">Purpose</th>
                           <th colspan="2">Remarks</th>
                       </tr>
                        <tr>
                            <td colspan="2">{{ $checkout->travel_mode }}</td>
                            
                            <td colspan="2"> {{ $checkout->category_name }} </td>
                            <td colspan="2"> {{ $checkout->travel_details }} </td>
                        </tr>
                        <tr>
                           <th colspan="2">To Dzongkhag</th>
                           <th colspan="2">To Gewog</th>
                           <th colspan="2">Present Address</th>
                       </tr>
                        <tr>
                            <td colspan="2"> {{ $checkout->Dzongkhag_Name }} </td>
                            <td colspan="2"> {{ $checkout->gewog_name }} </td>
                            <td colspan="2"> {{ $checkout->present_address }}</td>
                        </tr>
                        <tr>
                            <th colspan="6">Supporting Document </th>
                        </tr>
                        <tr>
                            <td colspan="6"> tesst.docx </td>
                        </tr>
        
                            @empty
                            <tr>
                                <td colspan="3">
                                    <span class="text-danger">No Pending Allocation</span>
                                </td>
                            </tr>
                        @endforelse
                       
                               
                        </tbody>
                    </table>
    <div class="row">
        <div class="col-md-10">
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
                        <label for="remarks"><strong>Checkout Date:</strong></label>
                       <input type="date" name="checkout_dt" id="checkout_dt">
                    </div>
                    <div class="col-sm-4">
                        <label for="remarks"><strong>Remarks if any:</strong></label>
                        <textarea class="form-control" name="remarks" id="remarks"></textarea>
                    </div>
                    <input type="hidden" name="reg_id" id="reg_id" value="{{$checkout->registration_id}}">
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
</script>
@endsection
