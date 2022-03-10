@extends('layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Roles: {{$qf->facility_name}}</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Edit Quaraintine Facility</h6>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('facility.update',$qf->id) }}" method="POST">
                @csrf
                @method('PUT')
                    <div class="form-group">
                        <label for="name" class="form-control-label">Facility Name</label>
                        <input class="form-control" type="text" name="fname" value="{{$qf->facility_name}}" required>
                        @if($errors->has('fname'))
                            <span class="text-danger">
                                {{ $errors->first('fname')}}
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="capacity" class="form-control-label">Capacity</label>
                        <input class="form-control" type="text" name="capacity" value="{{$qf->capacity}}" required>
                        @if($errors->has('capacity'))
                            <span class="text-danger">
                                {{ $errors->first('capacity')}}
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="dzongkhag" class="form-control-label">Dzongkhag</label>
                        <select class="form-control" name="dzongkhag" id="dzongkhag" required>
                        @foreach(\App\Models\Dzongkhag::getDzongkhag(Auth::user()->id) as $dzongkhag)
                            <option value="{{ $dzongkhag->id }}">{{ $dzongkhag->Dzongkhag_Name }}</option>
                            @endforeach
                                           
                                            
                      </select>
                        @if($errors->has('dzongkhag'))
                            <span class="text-danger">
                                {{ $errors->first('dzongkhag')}}
                            </span>
                        @endif
                    </div>
                    
                    <div class="form-group">
                        <label for="gewog" class="form-control-label">Gewog</label>
                        <select class="form-control" name="gewog" id="gewog" required>     
                      </select>
                        @if($errors->has('gewog'))
                            <span class="text-danger">
                                {{ $errors->first('gewog')}}
                            </span>
                        @endif
                    </div>
                    
                    <div>
                        <button class="btn btn-danger pull-right">Update</button>
                    </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
$( document ).ready(function() {
    @foreach(App\Models\Gewog::all() as $gewog)
                $('select[name="gewog"]').append('<option {{ $qf->gewog_id==$gewog->id ? 'selected' : '' }} value="{{ $gewog->id }}">{{ $gewog->gewog_name }}</option>');   
    @endforeach
    $('#dzongkhag').on('change', function() {
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
                            $('#gewog').empty();
                            //$('#gewog').append('<option hidden>Choose Gewog</option>'); 
                            $.each(data, function(key, gewog){
                               
                                $('select[name="gewog"]').append('<option value="'+ gewog.id +'">' + gewog.gewog_name + '</option>');
                            });
                        }else{
                            $('#gewog').empty();
                        }
                     }
                   });
               }else{
                 $('#gewog').empty();
               }
            });
           
     
});
</script>
@endsection