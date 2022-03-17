@extends('layouts.master')

@section('content')
    <div class="container-fluid">
    @if ($message=Session::get('flash_message')) 
        
        <div class="alert alert-primary alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{$message}}</strong> 
        
        </div>
    @endif
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
                            <th>Facility Name</th>
                            <th>Capacity</th>
                            <th>Dzongkhag</th>
                            <th>Gewog</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tfoot>
                        
                    </tfoot>
                    <tbody>
                            @foreach($facility as $facility)
                        <tr>
                            <td> {{ $loop->iteration }} </td>
                            <td>{{ $facility->facility_name }}</td>
                            <td>{{ $facility->capacity }}</td>
                            <td>{{ str_replace(array('[',']','"'),'', App\Models\Checkin::dzongkhag($facility->dzongkhag_id)->pluck('Dzongkhag_name')) }}</td>
                            <td>{{ str_replace(array('[',']','"'),'', App\Models\Checkin::gewog($facility->gewog_id)->pluck('gewog_name')) }}</td>
                            <td><a href="{{ route('facility.edit',$facility->id) }}" class="btn btn-info btn-sm"><i class="fas fa-check .btn-sm"></i></i></a>
                            <button id="delete" class="btn btn-danger btn-sm" onclick="
    event.preventDefault();
    if (confirm('Are you sure? It will delete the data permanently!')) {
        document.getElementById('destroy{{ $facility->id }}').submit();
    }
    ">
    <i class="fas fa-trash .btn-sm"></i>
    <form id="destroy{{ $facility->id }}" class="d-none" action="{{ route('facility_delete', $facility->id) }}" method="POST">
        @csrf
        @method('delete')
    </form>
</button>
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
                            <option value="0"> Select Dzongkhag</option>
                            @foreach(\App\Models\Dzongkhag::getDzongkhag(Auth::user()->id) as $dzongkhag)
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
        $('#dataTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                title: 'Quaraintine Facility'
            },
            // {
            //     extend: 'pdfHtml5',
            //     title: 'Data export'
            // }
        ]
    } );
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