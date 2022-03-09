@extends('layouts.master')


@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#') }}">Products</a></li>
        <li class="breadcrumb-item active">Categories</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                
                <div class="card">
                    <div class="card-body">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categoryCreateModal">
                            Add Facility <i class="bi bi-plus"></i>
                        </button>

                        <hr>

                        <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Roles</th>
                            <th>Permission</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        
                    </tfoot>
                    <tbody>
                            @foreach($facility as $facility)
                        <tr>
                            <td>{{ $facility->facility_name }}</td>
                            <td>{{ $facility->facility_name}}</td>
                            <td>{{ str_replace(array('[',']','"'),'', $facility->dzongkhag($facility->dzongkhag_id)->pluck('Dzongkhag_name')) }}</td>
                            <td>
                                
                            </td>
                        </tr>
                        @endforeach
        
                    </tbody>
                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="categoryCreateModal" tabindex="-1" role="dialog" aria-labelledby="categoryCreateModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryCreateModalLabel">Add Quaraintine Facility</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('addfacility') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                    <div class="form-group">
                            <label for="category_code">Facility Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="facility_name" required>
                        </div>
                        <div class="form-group">
                            <label for="category_code">Capacity <span class="text-danger">*</span></label>
                            <input class="form-control" type="number" name="capacity" required>
                        </div>
                        <div class="form-group">
                            <label for="category_name">Dzongkhag </label>
                            <select name="dzongkhag" id="dzongkhag" class="form-control">
                            @foreach(\App\Models\Dzongkhag::all() as $dzongkhag)
                            <option value="{{ $dzongkhag->id }}">{{ $dzongkhag->Dzongkhag_Name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category_name">Gewog </label>
                            <select name="gewog" id="gewog" class="form-control">
                            
                            </select>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Create <i class="bi bi-check"></i></button>
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
                            //$('#f_gewog').append('<option hidden>Choose Gewog</option>'); 
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