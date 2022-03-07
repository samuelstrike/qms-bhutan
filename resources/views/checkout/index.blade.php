@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
          <h5><b>Allocate Quarantine Facility</b></h5>
        </div>
       <div class="card-body">
       <table class="table table-bordered table-striped text-center mb-0">
                        
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
                                <i class="bi bi-pencil"></i>
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
@endsection