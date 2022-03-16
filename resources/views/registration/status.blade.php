<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quarantine Registration</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <style>
        .error {
    color: red;
    position: relative;
    line-height: 1;
    width: revert;
    font-size: revert;
}
    </style>
    
</head>

<body class="bg-gradient-dark">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Your Registration Status</h1>
                            </div>
                           
                                
                               
                                <hr>
                              @if($status)
                                    <div class="form-group row">
                                        <div class="col-lg-6 mb-3 mb-md-0">
                                            <label for="cid" class="form-control-label">CID/work permit/Passport</label>
                                            <input type="text" class="form-control cid" id="cid" name="cid" readonly value="{{ $status->cid }}" >
                                                
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="" class="form-control-label">Full Name</label>
                                            <input type="text" class="form-control name" id="name" name="name" value="{{ $status->name }}" readonly>
                                                   
                                        </div>
                                    </div>
                                    <div class="form-group row">    
                                        <div class="col-lg-4">
                                            <label for="gender">From</label>
                                            <input type="text" class="form-control name" id="from" name="from" 
                                            
                                            value="{{ str_replace(array('[',']','"'),'', App\Models\Checkin::gewog($status->from_gewog_id)->pluck('gewog_name')) }},{{ str_replace(array('[',']','"'),'', App\Models\Checkin::dzongkhag($status->from_dzongkhag_id)->pluck('Dzongkhag_name')) }}" readonly>
                                                                                       
                                        </div>
                                        <div class="col-lg-4">
                                        <label for="gender">To</label>
                                        <input type="text" class="form-control name" id="to" name="to" 
                                        value="{{ str_replace(array('[',']','"'),'', App\Models\Checkin::gewog($status->to_gewog_id)->pluck('gewog_name')) }},{{ str_replace(array('[',']','"'),'', App\Models\Checkin::dzongkhag($status->to_dzongkhag_id)->pluck('Dzongkhag_name')) }}" readonly>    
                                        </div>
                                        <div class="col-lg-4">
                                             <label for="gender">Status</label>
                                            <input type="text" class="form-control name" id="staus" name="status" 
                                            value="{{ str_replace(array('[',']','"'),'', App\Models\Registration::getStatus($status->r_status)) }}" readonly>
                                        </div>
                                        
                                    </div>
                                @if($status->r_status=="T")    
                                <hr>
                                <div class="form-group row">
                                        <div class="col-lg-4">
                                             <label for="gender">Dzongkhag</label>
                                            <input type="text" class="form-control name" id="staus" name="status" 
                                            value="{{ str_replace(array('[',']','"'),'', App\Models\Transfer::getDzongkhag($status->id)) }}" readonly>
                                        </div>
               
                                        
                                </div> 
                                @endif

                                @if($status->r_status=="A")    
                                <hr>
                                <div class="form-group row">
                                        <div class="col-lg-4">
                                             <label for="gender">Facility Name</label>
                                            <input type="text" class="form-control name" id="staus" name="status" 
                                            value="{{ str_replace(array('[',']','"'),'', App\Models\Quanaintine_Facility::getFacility($status->id)) }}" readonly>
                                        </div>
                                        <div class="col-lg-4">
                                             <label for="gender">Checkin Date</label>
                                            <input type="text" class="form-control name" id="staus" name="status" 
                                            value="{{ str_replace(array('[',']','"'),'', App\Models\Checkin::getDate($status->id)) }}" readonly>
                                        </div>
                                        
                                </div> 
                                @endif

                                </div>
                               @else

                               <div class="form-group row">
                                        <div class="col-lg-4">
                                             <label for="gender">No Data Available</label>
                                          
                                        </div>
               
                                        
                                </div> 
                               
                                @endif


                                
                               
                               
                                
                                
                              
                      
                    </div>
                </div>
            </div>
        </div>

    </div>


</body>

</html>