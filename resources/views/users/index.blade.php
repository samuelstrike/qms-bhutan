@extends('layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User Registration</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>
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
            <h6 class="m-0 font-weight-bold text-dark">Users</h6>
            <a href="#" class="btn btn-dark pull-right" data-toggle="modal" data-target="#create_user">Create User</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Created On</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        
                    </tfoot>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email}}</td>
                            <td>{{ $user->getRoleNames();}}</td>
                            <td>{{  $user->created_at->diffForHumans();}}</td>
                            <td class="d-flex justify-content-evenly">
                                
                               <a href="{{ route('register-user.edit',$user->id)}}" class="btn btn-dark btn-circle btn-sm"><i class="fas fa-info-circle"></i></a>&nbsp;
                               <a href="#" class="btn btn-danger btn-circle btn-sm" data-name={{$user->name}} data-action="{{route('register-user.destroy', $user->id)}}" data-toggle="modal" data-target="#deleteUser"><i class="fas fa-trash"></i></a>
                               {{-- <form method="POST" action="{{route('register-user.destroy', $user->id)}}">
                                @csrf  
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></button>  
 
                               </form>   --}}
                            </td>
                        </tr>
                        @endforeach
        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="create_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create User</h6>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{route('register-user.store')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="form-control-label">Name</label>
                            <input class="form-control" type="text" name="name" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-control-label">Email</label>
                            <input class="form-control" type="text" name="email" value="" required>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="admin" id="admin" value="1" >
                            <label for="admin" class="form-check-label">Admin</label></label>
                        </div>
                        <div id="hide_dzong">
                            <div class="form-group">
                                <label for="dzongkhag" class="form-control-label">Dzongkhag</label>
                                <select name="dzongkhag" id="dzongkhag" class="form-control">
                                    <option  value="" selected>Select Dzongkhag</option>
                                @foreach(\App\Models\Dzongkhag::all() as $dzongkhag)
                                    
                                    <option  value="{{ $dzongkhag->id }}" aria-required="true">{{ $dzongkhag->Dzongkhag_Name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gewog" class="form-control-label">Gewog</label>
                                <select multiple="multiple" class="form-control" name="gewog[]" id="gewog" disabled>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="roles" class="form-control-label">Roles</label>
                            <select name="roles" id="" class="form-control">
                                <option value="" selected>Select Roles</option>
                                @foreach (\Spatie\Permission\Models\Role::all() as $roles)
                                <option  value="{{$roles->id}}">{{$roles->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password" class="form-control-label">Password</label>
                            <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="form-control-label">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Create User</button>
  
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Delete Modal-->
<div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h6 class="modal-title text-danger" id="exampleModalLabel">Delete User?</h6>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        
        <form action="{{route('register-user.destroy', $user->id)}}" method="POST">
        <div class="modal-body">Are you sure, you want to delete?</div>
            @csrf
            @method('delete')
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-danger" type="submit">Delete</button>
            </div>
        </div>    
        </form>
    
</div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        
        $('#deleteUser').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var action = button.data('action') 
            var modal = $(this)
            modal.find('form').attr('action', action)
        });

        
        //toggle admin and dzongkhag
        $('input[type="checkbox"]').click(function(){
            $('#hide_dzong').toggle();
	    });

        $('#dataTable').DataTable();
        
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
                            $("#gewog").attr('disabled', false);
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

