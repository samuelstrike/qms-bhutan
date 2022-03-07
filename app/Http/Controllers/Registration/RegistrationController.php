<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\DB;
class RegistrationController extends Controller
{
    public function index()
    {

        return view ('registration.index');
    }

    public function store(Request $request)
    {
        
       $ref = \random_int(100000,999999);
        
       $nationality = $request->nationality;
       $cid=$request->cid;
       $name = $request->name;
       $gender = $request->gender;
       $contact = $request->phone;
       $presentDzong= $request->dzongkhag;
       $presentGewog= $request->gewog;
       $presentResidence = $request->resident;
       $occupation = $request->occupation;
       $travelPurpose = $request->purpose;
       $treavelDzo = $request->dzong_travel;
       $travelGewog = $request->gewog_travel;
       $travelReason= $request->reason;
       $travelMode = $request->travel;
       $vaccineStatus = $request->vaccine;

       for($count =0; $count < count($cid); $count++){
            $data = array(
                'ref_id' => $ref,
                'cid' => $cid[$count],
                'name' => $name[$count],
                'gender' => $gender[$count],
                'phone_no' => $contact[$count],
                'from_dzongkhag_id' => $presentDzong,
                'from_gewog_id' =>$presentGewog,
                'present_address' => $presentResidence,
                'occupation_id' =>$occupation[$count],
                'purpose_category_id'=>$travelPurpose,
                'to_dzongkhag_id'=>$treavelDzo,
                'to_gewog_id' =>$travelGewog,
                'travel_mode' =>$travelMode,
                'vaccine_status_id' => $vaccineStatus

            );
            
            $insert[]=$data;
            dd($insert);

            Registration::create($insert);
            return 'success';
       }


        

    }
    
    public function apply(Request $request)
    {
        $ref = \random_int(100000,999999);
        foreach ($request->cid as $key => $id) {

            DB::table('registrations')->insert([
                'ref_id' =>$ref,
                'nationality_id' => $request->selectNationality[$key],
                'has_cid'   => 1,
                'cid' => $request->cid[$key],
                'name' => $request->name[$key],
                'gender' => 'Male',
                'phone_no' => $request->phone,
                'present_address' => $request->resident,
                'occupation_id' => $request->occupation[$key],
                'travel_details' => $request->reason,
                'travel_mode' => $request->travel,
                'from_dzongkhag_id' =>$request->f_dzongkhag,
                'from_gewog_id' => $request->f_gewog,
                'to_dzongkhag_id' => $request->t_dzongkhag,
                'to_gewog_id' => $request->t_gewog,
                'vaccine_status_id' => $request->vaccine[$key],
                'r_status' =>'P',
            ]);
        }
    
    }
}
