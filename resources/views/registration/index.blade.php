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
                                <h1 class="h4 text-gray-900 mb-4">Register for Quarantine Facility</h1>
                            </div>
                            <form class="user" action="{{route('apply')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div id="dynamicAddRemove">
                                    <div class="form-group row">
                                        <div class="col-lg-6 mb-3 mb-md-0">
                                            <label for="nema" class="form-control-label">CID/work permit</label>
                                            <input type="text" class="form-control" id="cid[0]" name="cid[0]"
                                                placeholder="Enter CID/work permit"  required>
                                                
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="" class="form-control-label">Full Name</label>
                                            <input type="text" class="form-control" id="name[0]" name="name[0]"
                                                placeholder="Full Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">    
                                        <div class="col-lg-3">
                                            <label for="gender">Gender</label>
                                            <select id="gender[0]" name="gender[0]" class="form-control" >
                                                <option value="1" selected>Male</option>
                                                <option value="2">Female</option>
                                                <option value="Others">others</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="">Occupation</label>
                                            <select name="occupation[0]" id="occupation[0]" class="form-control" >
                                            <option selected>Your Occupation</option>
                                            @foreach(\App\Models\Occupation::all() as $occupation)
                                                <option value="{{ $occupation->id }}">{{ $occupation->occupation_name }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="">Vaccination</label>
                                            <select name="vaccine[0]" id="vaccine[0]" class="form-control" >
                                                @foreach(\App\Models\Vaccination::all() as $vaccination)
                                                    <option value=" {{ $vaccination->id }}"> {{ $vaccination->dose_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="nat">Nationality</label>
                                            <select name="selectNationality[0]" id="selectNationality[0]" class="form-control">
                                                @foreach(\App\Models\Nationality::all() as $nationality)
                                                          <option value="{{ $nationality->id }}">{{ $nationality->nationality }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <a href="#" name="add" id="dynamic-ar" class="btn btn-primary btn-block btn-user mt-2">
                                        Add Accompanying Person
                                    </a>
                                </div>
                                <hr>
                                <div class="text-center">
                                    <h1 class="h6 text-gray-900 mb-4">Travel From</h1>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label for="nat">Dzongkhag</label>
                                        <select name="f_dzongkhag" id="f_dzongkhag" class="form-control">
                                            <option selected>Select the Dzongkhag you are travelling from</option>
                                            @foreach(\App\Models\Dzongkhag::all() as $dzongkhag)
                                                        <option value="{{ $dzongkhag->id }}">{{ $dzongkhag->Dzongkhag_Name }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="nat">Gewog</label>
                                        <select name="f_gewog" id="f_gewog" class="form-control" disabled>
                      
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="text-center">
                                    <h1 class="h6 text-gray-900 mb-4">Travel To</h1>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label for="nat">Dzongkhag</label>
                                        <select name="t_dzongkhag" id="t_dzongkhag" class="form-control">
                                            <option selected>Select the Dzongkhag you are travelling to</option>
                                            @foreach(\App\Models\Dzongkhag::all() as $dzongkhag)
                                                        <option value="{{ $dzongkhag->id }}">{{ $dzongkhag->Dzongkhag_Name }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="nat">Gewog</label>
                                        <select name="t_gewog" id="t_gewog" class="form-control" disabled>
                      
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="text-center">
                                    <h1 class="h6 text-gray-900 mb-4">Travel Details</h1>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label for="">Travel Purpose</label>
                                        <select name="purpose" id="" class="form-control">
                                            <option selected>Select</option>
                                            @foreach(\App\Models\Purpose::all() as $purpose)
                                            <option value="{{$purpose->id}}">{{$purpose->category_name}}</option>
                                            @endforeach
                                          </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">Present Address</label>
                                        <textarea name="resident" id="" cols="" rows="1" class="form-control" placeholder="Enter your residence address"></textarea>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="">Reason for travel</label>
                                        <textarea name="reason" id="" cols="" rows="1" class="form-control" placeholder="Specify Reason"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label for="">Travel mode</label>
                                        <select name="travel" id="" class="form-control">
                                            <option selected>Select</option>
                                            <option>Private Car</option>
                                            <option>Bus</option>
                                            <option>Taxi</option>
                                            <option>Government Vehicle</option>
                                            <option>No Vehicle</option>
                                            
                                          </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">Contact Number</label>
                                        <input type="number" class="form-control required number mobileInput" name="phone" autocomplete="off">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="">Expected Date</label>
                                        <input type="date" name="t_date" id="t_date" class="form-control">
                                    </div> 
                                    <div class="col-lg-3">
                                        <label for="">Supporting Document</label>
                                        <input 
                                        type="file" 
                                        name="file" 
                                        id="inputFile"
                                        class="form-control @error('file') is-invalid @enderror" required>
                                    </div> 
                                </div>
                                <button type="submit" class="btn btn-primary btn-block btn-user">
                                    Submit Your Registration Detail
                                </button>
                              
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin-2.min.js')}}"></script>

    <script>
        $(document).ready(function(){
        
        var i = 0;
        
       
        $("#dynamic-ar").click(function (e) {
            e.preventDefault();
           
            ++i;
            $("#dynamicAddRemove").append('<div><div class="form-group row"><div class="col-lg-6 mb-3 mb-md-0"><label for="nema" class="form-control-label">CID/work permit</label><input type="text" class="form-control" id="cid['+i+']" name="cid['+i+']"placeholder="Enter CID/work permit"></div><div class="col-lg-6"><label for="" class="form-control-label">Full Name</label><input type="text" class="form-control" id="name['+i+']" name="name['+i+']"placeholder="Full Name"></div></div><div class="form-group row"><div class="col-lg-3"><label for="gender">Gender</label><select id="gender['+i+']" name="gender['+i+']" class="form-control" ><option value="1" selected>Male</option><option value="2">Female</option><option value="Others">others</option></select></div><div class="col-lg-3"><label for="">Occupation</label><select name="occupation['+i+']" id="occupation['+i+']" class="form-control" ><option selected>Your Occupation</option>@foreach(\App\Models\Occupation::all() as $occupation)<option value="{{ $occupation->id }}">{{ $occupation->occupation_name }}</option>@endforeach</select></div><div class="col-lg-3"><label for="">Vaccination</label><select name="vaccine['+i+']" id="vaccine['+i+']" class="form-control" >@foreach(\App\Models\Vaccination::all() as $vaccination)<option value=" {{ $vaccination->id }}"> {{ $vaccination->dose_name }}</option>@endforeach</select></div><div class="col-lg-3"><label for="nat">Nationality</label><select name="selectNationality['+i+']" id="selectNationality['+i+']" class="form-control">@foreach(\App\Models\Nationality::all() as $nationality)<option value="{{ $nationality->id }}">{{ $nationality->nationality }}</option>@endforeach</select></div></div><button type="button"  class="btn btn-danger btn-block btn-user mt-2 remove-input-field">Delete Accompanying Individuals</button></div>');
         });
        $(document).on('click', '.remove-input-field', function () {
            $(this).closest('div').remove();
        });
        
      
       
          $('#f_dzongkhag').on('change', function() {
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
                                $('#f_gewog').empty();
                                $("#f_gewog").attr('disabled', false);
                                //$('#f_gewog').append('<option hidden>Choose Gewog</option>'); 
                                $.each(data, function(key, gewog){
                                   
                                    $('select[name="f_gewog"]').append('<option value="'+ gewog.id +'">' + gewog.gewog_name + '</option>');
                                });
                            }else{
                                $('#f_gewog').empty();
                            }
                         }
                       });
                   }else{
                     $('#f_gewog').empty();
                   }
                });
                // var id =document.getElementById('cid['+i+']').value;
                // alert(id);
    
                $('#t_dzongkhag').on('change', function() {
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
                                $('#t_gewog').empty();
                                $("#t_gewog").attr('disabled', false);
                                //$('#f_gewog').append('<option hidden>Choose Gewog</option>'); 
                                $.each(data, function(key, gewog){
                                   
                                    $('select[name="t_gewog"]').append('<option value="'+ gewog.id +'">' + gewog.gewog_name + '</option>');
                                });
                            }else{
                                $('#t_gewog').empty();
                            }
                         }
                       });
                   }else{
                     $('#t_gewog').empty();
                   }
                });

                //validation
                
                $flag=1;
                $("#cid").focusout(function(){
                    if($(this).val()==''){
                        $(this).css("border-color", "#FF0000");
                            $('#submit').attr('disabled',true);
                            $("#error_name").text("* You have to enter your first name!");
                    }
                    else
                    {
                        $(this).css("border-color", "#2eb82e");
                        $('#submit').attr('disabled',false);
                        $("#error_name").text("");

                    }
            });
          
               
        });
        
      
        
      </script>

</body>

</html>