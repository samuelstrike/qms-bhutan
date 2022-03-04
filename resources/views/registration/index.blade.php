@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
          <h5><b>Register for Quarantine Facility</b></h5>
        </div>
       <div class="card-body">
          <form action="">
              <div class="row">
                <div class="col-md-5">
                  <label for="nationality" class="form-label"><b>Nationality</b></label>
                  <div class="input-group">
                    <select name="" id="" class="form-select">
                      <option selected>Bhutanese</option>
                      <option value="2">Indian</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <label for="got-cid" class="form-label"><b>Do you have CID?</b></label>
                  <div class="d-flex justify-content-start">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                      <label class="form-check-label" for="flexRadioDefault1">
                        Yes
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                      <label class="form-check-label" for="flexRadioDefault1">
                        No
                      </label>
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <label for="" class="form-label"><b>Have minor?</b></label>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Yes</label>
                  </div>
                </div>
              </div>
              
              <div class="row mt-3">
                <div class="col-md-3">
                    <label for="cid" class="form-label"><b>CID/Passport</b></label>
                    <input type="number" class="form-control" name="CID" id="cid">
                </div>
                <div class="col-md-5">
                  <label for="name" class="form-label"><b>Name</b></label>
                  <input type="text" class="form-control" name="Name" id="name">
                </div>
                <div class="col-md-2">
                  <label for="gender" class="form-label"><b>Gender</b></label>
                  <div class="input-group">
                    <select name="" id="" class="form-select">
                        <option selected></option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                        <option value="3">others</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-2">
                  <label for="phone" class="form-label"><b>Contact Number</b></label>
                  <input type="text" class="form-control required number mobileInput" name="phone" autocomplete="off">
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
                <div class="col-sm-3">
                  <label for="" class="form-label">Occupation</label>
                    <select name="" id="" class="form-select">
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
                      <option value="">Medical Emergency</option>
                      <option value="">Official</option>
                    </select>
                  </div>
                  <div class="col-sm-3">
                    <label for="" class="form-label">Traveling from</label>
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
                  <div class="col-sm-3">
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
              </div>
              <div class="row mt-3 g-2">
                <div class="col-sm-6">
                  <label for="" class="form-label"><b>Reason for Travel</b></label>
                  <textarea name="" id="" class="form-control" placeholder="Specify Reason"></textarea>
                </div>
                <div class="col-sm-3">
                  <label for="" class="form-label"><b>Supporting Document</b></label>
                  <input type="file" class="form-control">
                </div>
                <div class="col-sm-3">
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