@extends('layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Roles: {{$permission->name}}</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Roles and Permissions</h6>
            </div>
        </div>
        <div class="card-body">
            <form action="/permissions/{{$permission->id}}" method="POST">
                @csrf
                @method('PUT')
                    <div class="form-group">
                        <label for="name" class="form-control-label">Permission Name</label>
                        <input class="form-control" type="text" name="name" value="{{$permission->name}}">
                        @if($errors->has('name'))
                            <span class="text-danger">
                                {{ $errors->first('name')}}
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
