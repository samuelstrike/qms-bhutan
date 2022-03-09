@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
          <h5><b>Allocate Quarantine Facility</b></h5>
        </div>
       <div class="card-body">
       <table class="table table-bordered table-striped text-center mb-0">
                        
                   
                        <tbody>
                       
                            
                @forelse($check_in_list as $checkin)
                       @if($loop->first)
                        <tr>
                           <th>CID</th>
                           <th colspan="2">Name</th>
                           <th>Gender</th>
                          
                           <th colspan="2">Occupation</th>
                           <th colspan="2">Vaccination Status</th>
                       </tr>
                       @endif
                        <tr>
                            <td>{{ $checkin->cid }}</td>
                            
                            <td colspan="2">{{ $checkin->name }} </td>
                            <td>{{ $checkin->gender }} </td>
                           
                            
                            <td colspan="2"> {{ $checkin->occupation_name }} </td>
                            <td colspan="2">{{ $checkin->dose_name }} </td>
                        </tr>
                        
                @if ($loop->last)
    
                        <tr>
                           <th colspan="2">Travel Mode</th>
                           <th colspan="2">Purpose</th>
                           <th colspan="2">Expected Travel Date </th>
                           <th colspan="2">Present Address</th>
                          
                       </tr>
                        <tr>
                            <td colspan="2">{{ $checkin->travel_mode }}</td>
                            
                            <td colspan="2"> {{ $checkin->category_name }} </td>
                            <td colspan="2"> {{ $checkin->expected_date }} </td>
                            <td colspan="2"> {{ $checkin->present_address }}</td>
                        </tr>
                        <tr>
                        <th colspan="2">From Dzongkhag</th>
                        <th colspan="2">From Gewog</th>   
                        <th colspan="2">To Dzongkhag</th>
                           <th colspan="2">To Gewog</th>
                           
                       </tr>
                        <tr>
                            <td colspan="2"> {{ $checkin->Dzongkhag_Name }} </td>
                            <td colspan="2"> {{ $checkin->gewog_name }} </td>
                            <td colspan="2"> {{ $checkin->Dzongkhag_Name }} </td>
                            <td colspan="2"> {{ $checkin->gewog_name }} </td>
                            
                        </tr>
                        <tr>
                            <th colspan="2">Phone Number</th>
                            <th colspan="4">Remarks</th>
                            <th colspan="2">Supporting Document </th>
                        </tr>
                        <tr>
                            <td colspan="2">{{ $checkin->phone_no }}</td>
                            <td colspan="4">
                                {{ $checkin->travel_details }} 
                            </td>
                       
                            <td colspan="2"> @if($checkin->file_name!="")
                                <a href="{{ route('downloadFile',$checkin->file_name) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> {{ $checkin->file_name }} </a>   

                                              @endif
                            </td>
                        </tr>
            @endif
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
        <form action="{{ route('allocate') }}" method="POST" enctype="multipart/form-data">
            @csrf
         
        <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="inputFirstname"><strong>Action:</strong></label>
                        <select name="selectaction" id="select-action" class="form-control">
                            <option>Reject</option>
                            <option>Allocate</option>
                            <option> Transfer</option>
                        </select>                          
                    </div>
                    <div class="col-sm-8">
                        <label for="remarks"><strong>Remarks if any</strong></label>
                        <textarea class="form-control" name="remarks" id="remarks"></textarea>
                    </div>
            <input type="hidden" name="ref_id" id="ref_id" value="{{$checkin->ref_id}}">
                </div>
                <div class="form-group row" id="Allocate" >
                    <div class="col-sm-4">
                        <label for="dzongkhag"><strong>Dzongkhag:</strong></label>
                        <select name="dzongkhag" id="dzongkhag" class="form-control">
                        <option value="0">Select Dzongkhag</option>
                        @foreach(\App\Models\Dzongkhag::all() as $dzongkhag)
                                <option value="{{ $dzongkhag->id }}">{{ $dzongkhag->Dzongkhag_Name }}</option>
                        @endforeach
                        </select>                          
                    </div>
                    <div class="col-sm-4">
                        <label for="facility"><strong>Facility</strong></label>
                        <select name="facility" id="facility" class="form-control">
                            
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <label for="room_no"><strong>Room Number</strong></label>
                        <input type="text" name="room_no" id="room_no" class="form-control" required>
                    </div>
                    <div class="col-sm-2">
                        <label for="room_no"><strong>Number of Days</strong></label>
                        <input type="number" name="days" id="days" class="form-control" required >
                    </div>
                    <div class="col-sm-2">
                        <label for="room_no"><strong>Funding</strong></label>
                        <select name="fund" id="fund" class="form-control">
                            <option>RGoB</option>
                            <option>Self</option>
                            <option>Company</option>
                            <option>Others</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <label for="room_no"><strong>CheckIn Date</strong></label>
                        <input type="date" name="checkin_dt" id="checkin_dt" class="form-control">
                    </div>
                </div>
                <div class="form-group row" id="Transfer" >
                    <div class="col-sm-4">
                        <label for="t_dzongkhag"><strong>Dzongkhag:</strong></label>
                        <select name="t_dzongkhag" id="t_dzongkhag" class="form-control">
                        <option value="0">Select Dzongkhag</option>
                        @foreach(\App\Models\Dzongkhag::all() as $dzongkhag)
                                <option value="{{ $dzongkhag->id }}">{{ $dzongkhag->Dzongkhag_Name }}</option>
                        @endforeach
                        </select>                          
                    </div>
                    <div class="col-sm-4">
                        <label for="t_gewog"><strong>Gewog:</strong></label>
                        <select name="t_gewog" id="t_gewog" class="form-control">
                           
                        </select>
                    </div>
                    
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
$( document ).ready(function() {
    $("input").attr("required",false);
    var x = document.getElementById("Allocate");
    var t = document.getElementById("Transfer");
    x.style.display = "none";
    t.style.display = "none";
    $('#select-action').on('change', function() {
        var optionID = $(this).val();
          
        if(optionID == "Allocate")
            {
                $("input").attr("required",true);
                x.style.display = "";
                t.style.display = "none";
            }
        else if (optionID == "Transfer")
        {
            $("input").attr("required",false);
            t.style.display = "";
            x.style.display = "none";
            
            
            
        }
        else{
            t.style.display = "none";
            x.style.display = "none";
            $("input").attr("required",false);
        }
          
            

    });

    //Facility Selection using dzongkhag

    $('#dzongkhag').on('change', function() {
               var DzoID = $(this).val();
                
            
               if(DzoID) {
                   $.ajax({
                       url: '/getFacility/'+DzoID,
                       type: "GET",
                       data : {"_token":"{{ csrf_token() }}"},
                       dataType: "json",
                       success:function(data)
                       {
                           
                         if(data){
                            $('#facility').empty();
                            //$('#facility').append('<option hidden>Choose facility</option>'); 
                            $.each(data, function(key, facility){
                               
                                $('select[name="facility"]').append('<option value="'+ facility.id +'">' + facility.facility_name + '</option>');
                            });
                        }else{
                            $('#facility').empty();
                        }
                     }
                   });
               }else{
                 $('#facility').empty();
               }
            });

            //Gewog Selection using Dzongkhag

            $('#t_dzongkhag').on('change', function() {
               var DzoID = $(this).val();
                
               
               if(DzoID) {
                
                   $.ajax({
                       url: '/getGewog/'+DzoID,
                       type: "GET",
                       data : {"_token":"{{ csrf_token() }}"},
                       dataType: "json",
                       success:function(data)
                       {
                         if(data){
                            $('#t_gewog').empty();
                            //$('#t_gewog').append('<option hidden>Choose Gewog</option>'); 
                            $.each(data, function(key, gewog){
                               
                                $('select[name="t_gewog"]').append('<option value="'+ gewog.id +'">' + gewog.gewog_name + '</option>');
                            });
                        }else{
                            $('#t_gewog').empty();
                        }
                     }
                   });
               }else{
                 $('#t_gewog').empty();
               }
            });
           
    
           
    
});
</script>
@endsection
