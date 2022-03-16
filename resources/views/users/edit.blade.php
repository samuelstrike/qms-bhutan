@extends('layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit User: {{$user->name}}</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div> --}}

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Edit User: {{$user->name}}</h6>
            </div>
        </div>
        <div class="card-body">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                        <ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                </div>
            @endif
            <form action="{{route('register-user.update',$user->id)}}" method="POST">
                @csrf
                @method('PUT')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name" class="form-control-label">Name</label>
                                <input class="form-control" type="text" name="name" value="{{$user->name}}" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email" class="form-control-label">Email</label>
                                <input class="form-control" type="text" name="email" value="{{$user->email}}" required>
                            </div>
                        </div>   
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="dzongkhag" class="form-control-label">Dzongkhag</label>
                                <select name="dzongkhag" id="dzongkhag" class="form-control">
                                
                                @foreach(\App\Models\Dzongkhag::all() as $dzongkhag) 
                                    <option {{ $dzo==$dzongkhag->id ? 'selected' : '' }} value="{{ $dzongkhag->id }}" aria-required="true" >{{ $dzongkhag->Dzongkhag_Name }}</option>
                                @endforeach
                               
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="gewog" class="form-control-label">Gewog</label>
                                <select multiple="multiple" class="form-control" name="gewog[]" id="gewog">
                                    @foreach($gewog as $gewog)
                                    <option value="{{$gewog->gewog_id}}" selected>{{$gewog->gewog_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="roles" class="form-control-label">Roles</label>
                                <select name="roles" id="" class="form-control">
                                    <option value= "{{$user->roles->first()->id}}"selected>{{$user->roles->first()->name}}</option>
                                    @foreach (\Spatie\Permission\Models\Role::all() as $roles)
                                    <option  value="{{$roles->id}}">{{$roles->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <button class="btn btn-primary">Update</button>
                    </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
     $(document).ready(function(){
       

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
                        // $("#gewog").attr('disabled', false);
                        //$('#f_gewog').append('<option hidden>Choose Gewog</option>'); 
                        $.each(data, function(key, gewog){
                        
                            $('#gewog').append('<option value="'+ gewog.id +'">' + gewog.gewog_name + '</option>');
                            // $("#gewog").append('<option value=' + key + '>' + gewog.gewog_name + '</option>');
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
