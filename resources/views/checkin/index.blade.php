@extends('layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Allocate Quaraintine Facility</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>
    @if ($message=Session::get('flash_message')) 
        
        <div class="alert alert-primary alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{$message}}</strong> 
        
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-gray-900">Pending Allocation</h6>
            
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>CID</th>
                            <th> Name </th>    
                            <th >Telephone</th>
                            <th >Purpose</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Expected Travel Dt.</th>
                            
                            <th>QS availed in the past</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        
                    </tfoot>
                    <tbody>
                        @forelse($check_in_list as $checkin)
                        <tr>
                            <td>{{ $checkin->cid }}</td>
                            <td>{{ $checkin->name }}</td>
                            <td> {{ $checkin->phone_no }} </td>
                            <td> {{ str_replace(array('[',']','"'),'', App\Models\Purpose::getName($checkin->purpose_category_id)->pluck('category_name')) }} </td>
                            <td>  {{ str_replace(array('[',']','"'),'', App\Models\Checkin::gewog($checkin->from_gewog_id)->pluck('gewog_name')) }},
                                 {{ str_replace(array('[',']','"'),'', App\Models\Checkin::dzongkhag($checkin->from_dzongkhag_id)->pluck('Dzongkhag_name')) }} 
                             </td>
                            <td> {{ str_replace(array('[',']','"'),'', App\Models\Checkin::gewog($checkin->to_gewog_id)->pluck('gewog_name')) }},
                            {{ str_replace(array('[',']','"'),'', App\Models\Checkin::dzongkhag($checkin->to_dzongkhag_id)->pluck('Dzongkhag_name')) }} </td>
                            </td>
                            <td> {{ date('d/M/y', strtotime($checkin->expected_date)) }}</td>
                            <td> 
                             @if ( App\Models\Registration::countReg($checkin->cid)-1<2)
                                {{ App\Models\Registration::countReg($checkin->cid)-1 }} time
                            @else
                            {{ App\Models\Registration::countReg($checkin->cid)-1 }} times
                             @endif
                        
                        </td>
                            <td>
                            <a href="{{ route('verify',$checkin->ref_id) }}" class="btn btn-dark btn-sm btn-circle">
                            <i class="fas fa-check .btn-sm"></i>
                            </a>
                            </td>

                            @empty
                            <tr>
                                <td colspan="7">
                                    <span class="text-danger">No Pending Allocation</span>
                                </td>
                            </tr>
                        @endforelse
                       
        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script>
    $(document).ready(function(){
        $('#dataTable').DataTable({
            responsive: true
        });
    });
    </script>

@endsection
