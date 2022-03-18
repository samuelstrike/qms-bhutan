@extends('layouts.master')

@section('content')
   <div class="container-fluid">
    @if ($message=Session::get('flash_message')) 
        
        <div class="alert alert-warning alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{$message}}</strong> 
        
        </div>
    @endif
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
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-dark">Your Profile</h6>
            </div>
        </div>
        <div class="card-body">
            <form action="">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Your Name</label>
                        <input type="text" name="name" class="form-control" id="" value="{{$user->name}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Email Address</label>
                        <input type="email" name="name" class="form-control" id="" value="{{$user->email}}">
                    </div>
                    <div class="mt-2 ml-3">
                        <button class="btn btn-dark btn-user">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-dark">Change Your Password</h6>
            </div>
        </div>
        <div class="card-body">
            <form action="">
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Current Password</label>
                        <input type="password" name="c_password" class="form-control" id="">
                    </div>
                    <div class="col-md-4">
                        <label for="">New Password</label>
                        <input type="password" name="password" class="form-control" id="" >
                    </div>
                    <div class="col-md-4">
                        <label for="">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="">
                    </div>
                    <div class="mt-2 ml-3">
                        <button class="btn btn-dark btn-user">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
   </div>
@endsection