@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
          <h5><b>Register for Quarantine Facility</b></h5>
        </div>
       <div class="card-body">
<<<<<<< Updated upstream
          <form method="post" action="{{route('registration.store')}}">
             @csrf
             @method('post')
=======
          <form action="{{route('apply')}}" method="POST">
            @csrf
>>>>>>> Stashed changes
              <div class="row g-3">
                <div class="col-md-6">
                  <label for="nationality" class="form-label"><b>Nationality</b></label>
                    <div class="input-group">
<<<<<<< Updated upstream
                      <select
                        name="nationality" id="selectNationality" class="form-select">
                        <option value="">Select Nationality</option>
                        @foreach(\App\Models\Nationality::all() as $nat)
                        <option value="{{$nat->id}}">{{$nat->nationality}}</option>
=======
                      <select name="selectNationality" id="selectNationality" class="form-select">
                      @foreach(\App\Models\Nationality::all() as $nationality)
                                <option value="{{ $nationality->id }}">{{ $nationality->nationality }}</option>
>>>>>>> Stashed changes
                        @endforeach
                      </select>
                    </div>
                </div>
                <div class="col-sm-6" id="selectCID">
                  <label for="got-cid" class="form-label"><b>Do you have CID?</b></label>
                  <div class="d-flex justify-content-start" id="noCID">
                    <div class="form-check">
                      <input class="form-check-input" value="yes" type="radio" name="flexRadioDefault1" id="flexRadioDefault1" checked>
                      <label class="form-check-label" for="flexRadioDefault">
                        Yes
                      </label>
                    </div>
                    <div class="form-check" >
                      <input
                        class="form-check-input" value="no" type="radio" name="flexRadioDefault1" id="">
                      <label class="form-check-label" for="flexRadioDefault">
                        No
                      </label>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="row mt-3" id="form-wrapper">
                <div class="col-md-3" >
                    <label for="cid" id="nameLabel" class="form-label"><b>Enter Your CID/Passport Nos</b></label>
                    <input type="number" class="form-control" name="cid[]" id="cid">
                </div>
                <div class="col-md-3">
                  <label for="name" class="form-label"><b>Your Full Name</b></label>
                  <input 
                    type="text" class="form-control" name="name[]" id="name" disabled>
                </div>
                <div class="col-md-2">
                  <label for="gender" class="form-label"><b>Gender</b></label>
                  <div class="input-group">
                    <select id="gender" name="gender[]" class="form-select" disabled>
                        <option selected></option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>others</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <label for="phone" class="form-label"><b>Contact Number</b></label>
                  <input type="text" class="form-control required number mobileInput" name="phone[]" autocomplete="off">
                </div>
                <div class="col-sm-2">
                  <label for="" class="form-label">Occupation</label>
                    <select name="occupation[]" id="" class="form-select">
                      <option selected>Select Occupation</option>
                      <option value="1">Student</option>
                      <option value="2">Civil Servant</option>
                      <option value="3">Private Sector </option>
                    </select>
                </div>
                <div class="col-md-2 add">
                  <label for="" class="form-label"><b>Any one accompanying?</b></label>
                  <div >
                    <button class="btn btn-success" id="addField">Add</button>
                  </div>
                </div>
              </div>
              <div class="row mt-3 g-2 d-flex justify-content-between">
                <label for="" class=""><b>Present Address</b></label>
                <div class="col-sm-3">
<<<<<<< Updated upstream
                  <label for="dzongkhag" class="form-label">Dzongkhag/Thromde</label>
                    <select name="dzongkhag" id="dzo_select" class="form-select">
                      <option selected>Select Dzongkhag/Thromde</option>
                      @foreach(\App\Models\Dzongkhag::all() as $dzo)
                      <option value="{{$dzo->id}}">{{$dzo->Dzongkhag_Name}}</option>
                      @endforeach
                    </select>
                </div>
                <div class="col-sm-3">
                  <label for="gewog" class="form-label">Gewog</label>
                    <select name="gewog" id="gewog_select" class="form-select">
=======
                  <label for="" class="form-label">Dzongkhag/Thromde</label>
                    <select name="f_dzongkhag" id="f_dzongkhag" class="form-select">
                    @foreach(\App\Models\Dzongkhag::all() as $dzongkhag)
                                <option value="{{ $dzongkhag->id }}">{{ $dzongkhag->Dzongkhag_Name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3">
                  <label for="" class="form-label">Gewog</label>
                    <select name="f_gewog" id="f_gewog" class="form-select">
                      
>>>>>>> Stashed changes
                    </select>
                </div>
                <div class="col-sm-4">
                  <label for="" class="form-label">Residence Address</label>
                  <textarea name="resident" id="" rows="1" class="form-control" placeholder="Enter your residence address"></textarea>
                </div>
<<<<<<< Updated upstream
                <div class="col-sm-2">
                  <label for="" class="form-label">Occupation</label>
                    <select name="occupation[]" id="" class="form-select">
                      <option selected>Select Occupation</option>
                      @foreach(\App\Models\Occupation::all() as $occupation)
                      <option value="{{$occupation->id}}">{{$occupation->occupation_name}}</option>
                      @endforeach
                    </select>
                </div>
=======
                
>>>>>>> Stashed changes
              </div>
              <div class="row mt-3 g-2">
                  <label for="" class="form-label"><b>Travel Details</b></label>
                  <div class="col-sm-2">
                    <label for="" class="form-label">Travel Purpose</label>
                    <select name="purpose" id="" class="form-select">
                      <option selected>Select</option>
                      @foreach(\App\Models\Purpose::all() as $purpose)
                      <option value="{{$purpose->id}}">{{$purpose->category_name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-sm-2">
<<<<<<< Updated upstream
                    <label for="dzong_travel" class="form-label">Traveling to</label>
                    <select name="dzong_travel" id="dzong_travel" class="form-select">
                      <option selected>Select Dzongkhag</option>
                      @foreach(\App\Models\Dzongkhag::all() as $dzo)
                      <option value="{{$dzo->id}}">{{$dzo->Dzongkhag_Name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-sm-2">
                    <label for="gewog_travel" class="form-label">Gewog</label>
                    <select name="gewog_travel" id="gewog_travel" class="form-select">
                   
=======
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
                      
>>>>>>> Stashed changes
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
                      <option value="1">Private Car</option>
                      <option value="2">Bus</option>
                      <option value="3">Taxi</option>
                      <option value="4">Government</option>
                    </select>
                  </div>
              </div>
              <div class="row mt-3 g-2">
                <div class="col-sm-3">
                  <label for="" class="form-label"><b>Supporting Document</b></label>
                  <input type="file" class="form-control">
                </div>
                <div class="col-sm-5">
                  <label for="" class="form-label"><b>Vaccination Status</b></label>
                  <div>
                    @foreach(\App\Models\Vaccination::all() as $vaccination)
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" name="vaccine" type="checkbox" id="" value="{{$vaccination->id}}">
                      <label class="form-check-label" for="inlineCheckbox1">{{$vaccination->dose_name}}</label>
                    </div>
                    @endforeach
                  </div>
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
      

      $('#selectNationality').on('change', function(){
        var optionValue = $(this).val();
        if (optionValue != 1){
          $("#name").prop('disabled',false);
          $("#gender").prop('disabled',false);
          $("#selectCID").hide();
          
        }
        else {
          $("#name").prop('disabled',true);
          $("#gender").prop('disabled',true);
          $("#selectCID").show();
        }
      });
      $('#noCID').on('click', function(){
        var checkCID = $('input:radio:checked').val()
        if (checkCID != 'yes'){
          $('#nameLabel').empty();
          $('#nameLabel').append("<b>Enter Your SRP/other Identification Nos</b>");
          $("#name").prop('disabled',false);
          $("#gender").prop('disabled',false);
        }
        else {
          $('#nameLabel').empty();
          $('#nameLabel').append("<b>CID/Passport Nos</b>");
          $("#name").prop('disabled',true);
          $("#gender").prop('disabled',true);
        }
      });
      $('#addField').on('click', function(e){
          e.preventDefault();
          var html = '';
          html+= '<div class="row mt-3">';
          html+= '<div class="col-md-3">';
          html+= '<label class="form-label"><b>Enter Your CID/Passport Nos</b></label>';
          html+= '<input type="number" class="form-control" name="cid[]">'; 
          html+= '</div>';
          html+= '<div class="col-md-3">';
          html+= '<label class="form-label"><b>Your Full Name</b></label>';
          html+= '<input type="text" class="form-control" name="name[]">'; 
          html+= '</div>';
          html+= '<div class="col-md-2">';
          html+= '<label class="form-label"><b>Gender</b></label>';
          html+= '<div class="input-group">';
          html+= '<select name="gender[]" class="form-select"><option selected></option><option value="1">Male</option><option value="2">Female</option><option value="3">others</option></select>';  
          html+= '</div>';  
          html+= '</div>';
          html+= '<div class="col-md-2">';
          html+= '<label class="form-label"><b>Contact Number</b></label>';
          html+= '<input type="text" class="form-control" name="phone[]">'  
          html+= '</div>';
          html+= '<div class="col-md-2">'; 
          html+= '<label class="form-label"><b>Occupation</b></label>';
          html+= '<select name="occuption[]" class="form-select"><option selected>Occuption</option>@foreach(\App\Models\Occupation::all() as $occp)<option value="{{$occp->id}}">{{$occp->occupation_name}}</option>@endforeach</select>';      
          html+= '</div>';
          html+= '<div class="mt-3"><button type="button" class="btn btn-danger" id="remove">Delete Accompanying Members</button></div>'
          html+= '</div>';
          $('#form-wrapper').append(html);
      })
      $(document).on('click','#remove', function(e){
        e.preventDefault();
        $(this).closest('.row').remove();
      });

      //Gewog Selection using Dzongkhag for present Address

      $('#dzo_select').on('change', function() {
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
                            $('#gewog_select').empty();
                            //$('#t_gewog').append('<option hidden>Choose Gewog</option>'); 
                            $.each(data, function(key, gewog){
                               
                                $('select[name="gewog"]').append('<option value="'+ gewog.id +'">' + gewog.gewog_name + '</option>');
                            });
                        }else{
                            $('#gewog_select').empty();
                        }
                     }
                   });
               }else{
                 $('#gewog_select').empty();
               }
            });

            //Gewog Selection using Dzongkhag for present Address

      $('#dzong_travel').on('change', function() {
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
                            $('#gewog_travel').empty();
                            //$('#t_gewog').append('<option hidden>Choose Gewog</option>'); 
                            $.each(data, function(key, gewog){
                               
                                $('select[name="gewog_travel"]').append('<option value="'+ gewog.id +'">' + gewog.gewog_name + '</option>');
                            });
                        }else{
                            $('#gewog_travel').empty();
                        }
                     }
                   });
               }else{
                 $('#gewog_travel').empty();
               }
            });

           
      
    });
    
  
    
  </script>
@endsection