@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
          <h5><b>Register for Quarantine Facility</b></h5>
        </div>
       <div class="card-body">
          <form action="">
              <div class="row g-3">
                <div class="col-md-6">
                  <label for="nationality" class="form-label"><b>Nationality</b></label>
                    <div class="input-group">
                      <select
                        name="" id="selectNationality" class="form-select">
                        <option value="">Select Nationality</option>
                        <option value="1">Bhutanese</option>
                        <option value="2">Indian</option>
                        <option value="2">USA</option>
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
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                        <option value="3">others</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <label for="phone" class="form-label"><b>Contact Number</b></label>
                  <input type="text" class="form-control required number mobileInput" name="phone[]" autocomplete="off">
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
                  <label for="" class="form-label">Dzongkhag/Thromde</label>
                    <select name="" id="" class="form-select">
                      <option selected>Select Dzongkhag/Thromde</option>
                      <option value="">Thimphu Thromde</option>
                      <option value="">Thimphu </option>
                    </select>
                </div>
                <div class="col-sm-3">
                  <label for="" class="form-label">Gewog</label>
                    <select name="" id="" class="form-select">
                      <option selected>Select Gewog</option>
                      <option value="1">Thimphu Thromde</option>
                      <option value="2">Thimphu </option>
                    </select>
                </div>
                <div class="col-sm-4">
                  <label for="" class="form-label">Residence Address</label>
                  <textarea name="" id="" rows="1" class="form-control" placeholder="Enter your residence address"></textarea>
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
              </div>
              <div class="row mt-3 g-2">
                  <label for="" class="form-label"><b>Travel Details</b></label>
                  <div class="col-sm-2">
                    <label for="" class="form-label">Travel Purpose</label>
                    <select name="" id="" class="form-select">
                      <option selected>Select</option>
                      <option value="1">Medical Emergency</option>
                      <option value="2">Official</option>
                    </select>
                  </div>
                  <div class="col-sm-2">
                    <label for="" class="form-label">Traveling to</label>
                    <select name="" id="" class="form-select">
                      <option selected>Select Dzongkhag</option>
                      <option value="">Thimphu</option>
                      <option value="">Official</option>
                    </select>
                  </div>
                  <div class="col-sm-2">
                    <label for="" class="form-label">Gewog</label>
                    <select name="" id="" class="form-select">
                      <option selected>Select</option>
                      <option value="">Medical Emergency</option>
                      <option value="">Official</option>
                    </select>
                  </div>
                  <div class="col-sm-4">
                    <label for="" class="form-label"><b>Reason for Travel</b></label>
                    <textarea name="" id="" rows="1" class="form-control" placeholder="Specify Reason"></textarea>
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
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                      <label class="form-check-label" for="inlineCheckbox1">First Dose</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                      <label class="form-check-label" for="inlineCheckbox2">Second Dose</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                      <label class="form-check-label" for="inlineCheckbox3">Booster Dose</label>
                    </div>
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
          html+= '<select name="occuption[]" class="form-select"><option selected>Occuption</option><option value="1">Student</option><option value="2">Civil Servant</option><option value="3">Private Sector</option></select>';      
          html+= '</div>';
          html+= '<div class="mt-3"><button type="button" class="btn btn-danger" id="remove">Delete Accompanying Members</button></div>'
          html+= '</div>';
          $('#form-wrapper').append(html);
      })
    
    });
    $(document).on('click','#remove', function(e){
      e.preventDefault();
      $(this).closest('.row').remove();
    });
  
  </script>
@endsection