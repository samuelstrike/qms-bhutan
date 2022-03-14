@extends('layouts.app')
@section('content')
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
          
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            
          @if ($message=Session::get('flash_message')) 
        
               <ul>
                <div class="alert alert-secondary alert-block">
                  {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>   --}}
                  <strong>{{$message}}</strong> 
                    
                </div>
               </ul>
            @endif
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body pt-4 text-center">
            
              <div class="mb-md-5 mt-md-4 pb-5">
                <div class="form-outline form-white mb-4">
                    <img src="{{asset('logo/rgob-logo.png')}}" width="150px" class="img-fluid img-thumbnail" alt="...">    
                </div>
               
                <h2 class="fw-bold mb-2 text-uppercase">Covid19 Quarantine Facility Registration</h2>
  
                <div class="form-outline form-white mb-4">
                  <a href="{{route('registration.index')}}" class="btn btn-outline-light btn-lg px-5">Register for Quarantine</a>
                </div>
                <div class="form-outline form-white mb-4">
                    <a href="#" class="btn btn-outline-light btn-lg px-5">Track Your Registration</a>
                  </div>
                
              </div>   
  
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
