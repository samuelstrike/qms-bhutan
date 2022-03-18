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
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

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
                                <h1 class="h4 text-gray-900 mb-4">Register for Quarantine Facility</h1>
                            </div>
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
                                <form class="user" action="{{route('apply')}}" method="POST" enctype="multipart/form-data" id="submitForm" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="got-cid" class="form-label text-gray-900">Are you travelling from abroad?</label>
                                        <div class="form-group d-flex justify-content-center">
                                          <div class="form-check" id="domestic">
                                            <input class="form-check-inline" type="radio" name="is_abroad" value="0" id="" checked>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                             No
                                            </label>
                                          </div>
                                          <div class="form-check " id="abroad">
                                            <input class="form-check-inline" type="radio" name="is_abroad" value="1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                              Yes
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                                <hr>
                                <div id="dynamicAddRemove">
                                    <div class="form-group row">
                                        <div class="col-lg-6 mb-3 mb-md-0">
                                            <label for="cid[0]" class="form-control-label text-gray-900">CID/work permit/Passport</label>
                                            <input type="text" class="form-control cid" id="cid[0]" name="cid[0]"
                                                placeholder="Enter your CID/work permit/Passport Numbers">
                                                
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="" class="form-control-label text-gray-900">Full Name</label>
                                            <input type="text" class="form-control name" id="name[0]" name="name[0]"
                                                placeholder="Enter your Full Name">
                                                   
                                        </div>
                                    </div>
                                    <div class="form-group row">    
                                        <div class="col-lg-3">
                                            <label for="gender" class="text-gray-900">Gender</label>
                                            <select id="gender[0]" name="gender[0]" class="form-control gender" >
                                                <option value="">Select</option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                                <option value="Others">others</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="" class="text-gray-900">Occupation</label>
                                            <select name="occupation[0]" id="occupation[0]" class="form-control occupation" >
                                            <option value="">Your Occupation</option>
                                            @foreach(\App\Models\Occupation::all() as $occupation)
                                                <option value="{{ $occupation->id }}">{{ $occupation->occupation_name }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="" class="text-gray-900">Vaccination</label>
                                            <select name="vaccine[0]" id="vaccine[0]" class="form-control vaccination" >
                                                <option value="">Select</option>
                                                @foreach(\App\Models\Vaccination::all() as $vaccination)
                                                    <option value=" {{ $vaccination->id }}"> {{ $vaccination->dose_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="nat" class="text-gray-900">Nationality</label>
                                            <select name="selectNationality[0]" id="selectNationality[0]" class="form-control nationality">
                                                <option value="">Select</option>
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
                                    <h1 class="h6 text-gray-900 mb-4" id="abroad_travel">Travel From</h1>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label for="nat" class="text-gray-900">Dzongkhag</label>
                                        <select name="f_dzongkhag" id="f_dzongkhag" class="form-control">
                                            <option value="">Select the Dzongkhag you are travelling from</option>
                                            @foreach(\App\Models\Dzongkhag::all() as $dzongkhag)
                                                        <option value="{{ $dzongkhag->id }}">{{ $dzongkhag->Dzongkhag_Name }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="nat" class="text-gray-900">Gewog</label>
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
                                        <label for="nat" class="text-gray-900">Dzongkhag</label>
                                        <select name="t_dzongkhag" id="t_dzongkhag" class="form-control">
                                            <option value="">Select the Dzongkhag you are travelling to</option>
                                            @foreach(\App\Models\Dzongkhag::all() as $dzongkhag)
                                                        <option value="{{ $dzongkhag->id }}">{{ $dzongkhag->Dzongkhag_Name }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="nat" class="text-gray-900">Gewog</label>
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
                                        <label for="" class="text-gray-900">Travel Purpose</label>
                                        <select name="purpose" id="" class="form-control">
                                            <option value="">Select</option>
                                            @foreach(\App\Models\Purpose::all() as $purpose)
                                            <option value="{{$purpose->id}}">{{$purpose->category_name}}</option>
                                            @endforeach
                                          </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="" class="text-gray-900">Present Address</label>
                                        <textarea name="resident" id="" cols="" rows="1" class="form-control" placeholder="Enter your residence address"></textarea>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="" class="text-gray-900">Reason for travel</label>
                                        <textarea name="reason" id="" cols="" rows="1" class="form-control" placeholder="Specify Reason"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label for="">Travel mode</label>
                                        <select name="travel" id="travel_mode" class="form-control">
                                            <option value="">Select</option>
                                            <option>Private Car</option>
                                            <option>Bus</option>
                                            <option>Taxi</option>
                                            <option>Government Vehicle</option>
                                            <option>No Vehicle</option>
                                            
                                          </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="phone" class="text-gray-900">Contact Number</label>
                                        <input type="text" class="form-control " id="cont" name="phone" autocomplete="off">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="" class="text-gray-900">Expected Date</label>
                                        <input type="text" name="t_date" id="t_date" class="form-control" placeholder="dd-mm-yyyy" readonly>
                                    </div> 
                                    <div class="col-lg-3">
                                        <label for="" class="text-gray-900">Supporting Document</label>
                                        <input 
                                        type="file" 
                                        name="file" 
                                        id="inputFile"
                                        class="form-control">
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin-2.min.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>



    <script type="text/javascript">
        $(document).ready(function(){
        
       $('#abroad').on('change', function(){
            $('#abroad_travel').text('Dzongkhag Entry Point ')
       });
       $('#domestic').on('change', function(){
            $('#abroad_travel').text('Travel From')
       });

      
       $('#t_date').datepicker({
        dateFormat: "dd-mm-yy",
        minDate: 0,
        autoSize: true
       });
        
        
        //dynamic field add
        var i = 0;
        $("#dynamic-ar").click(function (e) {
            e.preventDefault();
           
            ++i;
            $("#dynamicAddRemove").append('<div><div class="form-group row"><div class="col-lg-6 mb-3 mb-md-0"><label for="nema" class="form-control-label">CID/work permit</label><input type="text" class="form-control cid" id="cid['+i+']" name="cid['+i+']"placeholder="Enter CID/work permit"></div><div class="col-lg-6"><label for="" class="form-control-label">Full Name</label><input type="text" class="form-control name" id="name['+i+']" name="name['+i+']"placeholder="Full Name"></div></div><div class="form-group row"><div class="col-lg-3"><label for="gender">Gender</label><select id="gender['+i+']" name="gender['+i+']" class="form-control gender" ><option value="">Select</option><option value="1">Male</option><option value="2">Female</option><option value="Others">others</option></select></div><div class="col-lg-3"><label for="">Occupation</label><select name="occupation['+i+']" id="occupation['+i+']" class="form-control occupation" ><option value="">Your Occupation</option>@foreach(\App\Models\Occupation::all() as $occupation)<option value="{{ $occupation->id }}">{{ $occupation->occupation_name }}</option>@endforeach</select></div><div class="col-lg-3"><label for="">Vaccination</label><select name="vaccine['+i+']" id="vaccine['+i+']" class="form-control vaccination" ><option value="">Select</option>@foreach(\App\Models\Vaccination::all() as $vaccination)<option value=" {{ $vaccination->id }}"> {{ $vaccination->dose_name }}</option>@endforeach</select></div><div class="col-lg-3"><label for="nat">Nationality</label><select name="selectNationality['+i+']" id="selectNationality['+i+']" class="form-control nationality"><option value="">Select</option>@foreach(\App\Models\Nationality::all() as $nationality)<option value="{{ $nationality->id }}">{{ $nationality->nationality }}</option>@endforeach</select></div></div><button type="button"  class="btn btn-danger btn-block btn-user mt-2 remove-input-field">Delete Accompanying Individuals</button></div>');
        });
        $(document).on('click', '.remove-input-field', function () {
            $(this).closest('div').remove();
        });
        
      
       
            $('#f_dzongkhag').on('change', function() 
            {
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
           
            //validating date: dd-mm-yyyy
            $.validator.addMethod("dateFormat",function(value, element) {
                var check = false;
                var re = /^\d{1,2}\-\d{1,2}\-\d{4}$/;
            if( re.test(value)){
                var adata = value.split('-');
                var dd = parseInt(adata[0],10);
                var mm = parseInt(adata[1],10);
                var yyyy = parseInt(adata[2],10);
                var xdata = new Date(yyyy,mm-1,dd);
                if ( ( xdata.getFullYear() === yyyy ) && ( xdata.getMonth () === mm - 1 ) && ( xdata.getDate() === dd ) ) {
                check = true;
                }
                else {
                    check = false;
                }
            } else {
                check = false;
            }
                return this.optional(element) || check;
            },
                "Wrong date format"
            );

                //validation
                $('#submitForm').validate({
                    rules : {
                        phone: {
                            required:true,
                            digits:true,
                            minlength:8,
                            maxlength:8
                        },
                        travel : {
                            required: true
                        },
                        t_dzongkhag : {
                            required: true
                        },
                        f_dzongkhag : { 
                            required: true
                        },
                        purpose : {
                            required : true
                        },
                        resident : {
                            required : true,
                            minlength: 4,
                            maxlength: 100
                        },
                        reason : {
                            required : true,
                            minlength:5
                        },
                        t_date : {
                            required : true,
                            dateFormat: true
                        },
                        
                    },
                    messages : {
                        phone: 'Please enter your valid phone number(8 digit)',
                        travel: 'Please select your travel mode after completing quarantine',
                        t_dzongkhag : 'Please select the dzongkhag you want to travel',
                        f_dzongkhag : 'Please select the  dzongkhag you are traveling from',
                        purpose : 'Please select the travel Purpose',
                        resident: {
                            required: 'Please enter your exact residence address',
                            minlength: 'Please enter atleast 4 characters'
                        },
                        reason : {
                            required : 'Briefly enter the reason for your travel',
                            minlength : 'Please enter atleast 5 characters'
                        },
                        t_date : {
                            required : 'Please enter your expected date of journey',
                            dateFormat : 'Please enter a valid date (dd-mm-year)'
                        },
                    },
                    // errorElement: "em",
				    errorPlacement: function ( error, element ) {
					    // Add the `invalid-feedback` class to the error element
					    error.addClass( "invalid-feedback" );

					    if ( element.prop( "type" ) === "select" ) {
						    error.insertAfter( element.next( "label" ) );
					    } else {
						    error.insertAfter( element );
					    }
				    },
				    highlight: function ( element, errorClass, validClass ) {
					    $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
				    },
				    unhighlight: function (element, errorClass, validClass) {
					    $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
				    }
                    
                    
                });
                //custom validation for dynamic input for CID, Name, Gender, Occupation, Vaccination and Nationality    
                
                $.validator.addMethod("nRequired", $.validator.methods.required,
                    "Please enter your Full Name");
                $.validator.addMethod("cRequired", $.validator.methods.required,
                    "Please Enter Your CID/SRP/Passport Number"); 
                $.validator.addMethod("gRequired", $.validator.methods.required,
                    "Please Select Your Gender (Male/Female/others)");
                $.validator.addMethod("oRequired", $.validator.methods.required,
                    "Please Select Your Occupation Category");
                $.validator.addMethod("vRequired", $.validator.methods.required,
                    "Please Select Your recent vaccination dose");      
                $.validator.addMethod("natRequired", $.validator.methods.required,
                    "Please Select Your Nationality");       

                $.validator.addClassRules({
                    name: {
                        nRequired: true,
                        minlength: 3,
                        maxlength: 50,
                    },
                    cid : {
                        cRequired: true,
                        number: true,
                    },
                    gender : {
                        gRequired: true,
                    },
                    occupation : {
                        oRequired : true
                    },
                    vaccination : {
                        vRequired : true
                    },
                    nationality : {
                        natRequired : true
                    }
                        
                            
                });
                
               
        });
        
      
        
      </script>

</body>

</html>