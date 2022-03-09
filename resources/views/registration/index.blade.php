@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
          <h5><b>Register for Quarantine Facility</b></h5>
        </div>
       <div class="card-body">
          <form action="{{route('apply')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                    <th>Have CID</th>
                    <th>CID/Passport Number</th>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Occupation</th>
                    <th>Vaccination</th>
                    <th>Nationality</th
                </tr>
                <tr>
                    <td>
                      <label class="form-check-label" for="flexCheckChecked" name="yes_l[]" id="yes_l[]">Yes</label>  
                      <input class="form-check-input" type="radio"  name="cc[0]" id="cc[]">
                      <label class="form-check-label" for="flexCheckChecked" name="no_l[]" id="no_l[]">No</label>
                      <input class="form-check-input" type="radio"  name="cc[0]" id="cc[]">
                
                    </td>
                    <td><input type="number" class="form-control" name="cid[0]" id="cid[0]"></td>
                    <td><input type="text" class="form-control" name="name[0]" id="name[0]"required></td>
                    <td>
                    <select id="gender[0]" name="gender[0]" class="form-select" >
                        
                        <option value="1" selected>Male</option>
                        <option value="2">Female</option>
                        <option value="Others">others</option>
                    </select>
                    </td>
                    <td>
                    <select name="occupation[0]" id="occupation[0]" class="form-select">
                      @foreach(\App\Models\Occupation::all() as $occupation)
                                <option value="{{ $occupation->id }}">{{ $occupation->occupation_name }}</option>
                        @endforeach
                    </select>
                    </td>
                    <td>
                  <select id="vaccine" name="vaccine[0]" class="form-select">
                    @foreach(\App\Models\Vaccination::all() as $vaccination)
                      <option value=" {{ $vaccination->id }}"> {{ $vaccination->dose_name }}</option>
                    @endforeach
                    </select>
                    </td>
                    <td>
                    <select name="selectNationality[0]" id="selectNationality[0]" class="form-select">
                      @foreach(\App\Models\Nationality::all() as $nationality)
                                <option value="{{ $nationality->id }}">{{ $nationality->nationality }}</option>
                        @endforeach
                      </select>
                    </td>
                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Members</button></td>
                </tr>
            </table>
             
              <div class="row mt-3 g-2 d-flex justify-content-between">
              
              <label for="" class=""><b>Travel Details(To and From)</b></label>
                <div class="col-sm-2">
                  <label for="" class="form-label">Dzongkhag/Thromde</label>
                    <select name="f_dzongkhag" id="f_dzongkhag" class="form-select">
                    @foreach(\App\Models\Dzongkhag::all() as $dzongkhag)
                                <option value="{{ $dzongkhag->id }}">{{ $dzongkhag->Dzongkhag_Name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-2">
                  <label for="" class="form-label">Gewog</label>
                    <select name="f_gewog" id="f_gewog" class="form-select">
                      
                    </select>
                </div>
               
                  <div class="col-sm-2">
                    <label for="" class="form-label">Traveling to</label>
                    <select name="t_dzongkhag" id="t_dzongkhag" class="form-select">
                    @foreach(\App\Models\Dzongkhag::all() as $dzongkhag)
                                <option value="{{ $dzongkhag->id }}">{{ $dzongkhag->Dzongkhag_Name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="col-sm-2">
                    <label for="" class="form-label">Gewog</label>
                    <select name="t_gewog" id="t_gewog" class="form-select">
                      
                    </select>
                  </div>
                  <div class="col-md-2">
                  <label for="phone" class="form-label"><b>Contact Number</b></label>
                  <input type="number" class="form-control required number mobileInput" name="phone" autocomplete="off">
                </div>
                
              </div>
              <div class="row mt-3 g-2">
                  <label for="" class="form-label"><b>Travel Details</b></label>
                  <div class="col-sm-4">
                  <label for="" class="form-label">Residence Address</label>
                  <textarea name="resident" id="" rows="1" class="form-control" placeholder="Enter your residence address"></textarea>
                </div>
                <div class="col-sm-2">
                    <label for="" class="form-label">Travel Purpose</label>
                    <select name="purpose" id="" class="form-select">
                      <option selected>Select</option>
                      @foreach(\App\Models\Purpose::all() as $purpose)
                      <option value="{{$purpose->id}}">{{$purpose->category_name}}</option>
                      @endforeach
                    </select>
                  </div>    
                 
                  <div class="col-sm-4">
                    <label for="" class="form-label"><b>Reason for Travel</b></label>
                    <textarea name="reason" id="" rows="1" class="form-control" placeholder="Specify Reason"></textarea>
                  </div>
                  <div class="col-sm-2">
                    <label for="travel" class="form-label"><b>Travel mode from QF</b></label>
                    <select name="travel" id="" class="form-select">
                      <option selected>Select</option>
                      <option>Private Car</option>
                      <option>Bus</option>
                      <option>Taxi</option>
                      <option>Government Vehicle</option>
                      <option>No Vehicle</option>
                      
                    </select>
                  </div>
              </div>
              <div class="row mt-3 g-2">
                <div class="col-sm-3">
                  <label for="" class="form-label"><b>Supporting Document</b></label>
                  <input 
                        type="file" 
                        name="file" 
                        id="inputFile"
                        class="form-control @error('file') is-invalid @enderror" required>
        
                </div>
               
                <div class="col-sm-3">
                  <label for="" class="form-label"><b>Expected Travel Date</b></label>
                  <input type="date" name="t_date" id="t_date" class="form-control">
                </div>
               
              </div>
              <div class="row mt-3">
                <div class="col">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </div>
          </form>
        </div>
</div>

@endsection
@section('scripts')
  <script>
    $(document).ready(function(){
    
    var i = 0;
    
   
    $("#dynamic-ar").click(function () {
       
        ++i;
        $("#dynamicAddRemove").append('<tr><td><label class="form-check-label" for="flexCheckChecked" name="yes_l[]" id="yes_l[]">Yes</label><input class="form-check-input" type="radio"  name="cc['+i+']" id="cc['+i+']"><label class="form-check-label" for="flexCheckChecked" name="no_l[]" id="no_l[]">No</label><input class="form-check-input" type="radio"  name="cc['+i+']" id="cc['+i+']"></td> <td><input type="number" class="form-control" name="cid['+i+']" id="cid['+i+']"></td><td><input type="text" class="form-control" name="name['+i+']" id="['+i+']" required></td><td><select id="gender['+i+']" name="gender['+i+']" class="form-select"><option value="1" selected>Male</option><option value="2">Female</option><option value="3">others</option></select></td><td><select name="occupation['+i+']" id="occupation['+i+']" class="form-select"> @foreach(\App\Models\Occupation::all() as $occupation)<option value="{{ $occupation->id }}">{{ $occupation->occupation_name }}</option>@endforeach </select></td><td><select id="vaccine" name="vaccine['+i+']" class="form-select">@foreach(\App\Models\Vaccination::all() as $vaccination)<option value=" {{ $vaccination->id }}"> {{ $vaccination->dose_name }}</option>@endforeach</td><td><select name="selectNationality['+i+']" id="selectNationality['+i+']" class="form-select">@foreach(\App\Models\Nationality::all() as $nationality)<option value="{{ $nationality->id }}">{{ $nationality->nationality }}</option>@endforeach</select></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>');
     });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
    
  
   
      $('#f_dzongkhag').on('change', function() {
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
                            $('#f_gewog').empty();
                            //$('#f_gewog').append('<option hidden>Choose Gewog</option>'); 
                            $.each(data, function(key, gewog){
                               
                                $('select[name="f_gewog"]').append('<option value="'+ gewog.id +'">' + gewog.gewog_name + '</option>');
                            });
                        }else{
                            $('#f_gewog').empty();
                        }
                     }
                   });
               }else{
                 $('#f_gewog').empty();
               }
            });
            // var id =document.getElementById('cid['+i+']').value;
            // alert(id);

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
                            //$('#f_gewog').append('<option hidden>Choose Gewog</option>'); 
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