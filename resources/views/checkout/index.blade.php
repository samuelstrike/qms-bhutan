@extends('layouts.master')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Checkout </h1>
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
            <h6 class="m-0 font-weight-bold text-primary">Pending Checkout</h6>
            
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
                            <th>To Dzongkhag</th>
                            <th>To Gewog</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        
                    </tfoot>
                    <tbody>
                        @forelse($check_out_list as $checkout)
                        <tr>
                            <td>{{ $checkout->cid }}</td>
                            <td>{{ $checkout->name }}</td>
                            <td> {{ $checkout->phone_no }} </td>
                            <td> {{ $checkout->category_name }} </td>
                            
                            <td> {{ $checkout->Dzongkhag_Name }} </td>
                            <td> {{ $checkout->gewog_name }} </td>
                            <td>
                            <a href="{{ route('verifyCheckout',$checkout->registration_id) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-check .btn-sm"></i>
                            </a>
                            </td>

                            @empty
                            <tr>
                                <td colspan="7">
                                    <span class="text-danger">No Pending Checkout</span>
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
        $('#dataTable').DataTable();
    });
    </script>

@endsection
