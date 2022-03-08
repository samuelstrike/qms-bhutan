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
    
    public function apply(Request $request)
    {
        $ref = \random_int(100000,999999);
        $request->validate([
            'file' => 'required|mimes:pdf,xlx,csv|max:100024',
        ]);
        $filenameWithExt = $request->file('file')->getClientOriginalName();
        $fileName = time().'.'.$filenameWithExt;
        $request->file->move(public_path('uploads/files'), $fileName);
        
        // $gender="";
        foreach ($request->cid as $key => $id) {

           if($request->gender[$key]==1)
                $gender = "Male";
            else
            if($request->gender[$key]==2)
                $gender = "Female";
            else
            if($request->gender[$key]==3)
                $gender = "Others";
            

            DB::table('registrations')->insert([
                'ref_id' =>$ref,
                'nationality_id' =>$request->selectNationality[$key] ,
                'has_cid'   => 1,
                'cid' => $request->cid[$key],
                'name' => $request->name[$key],
                'gender' =>$gender,
                'phone_no' => $request->phone,
                'present_address' => $request->resident,
                'occupation_id' => $request->occupation[$key],
                'purpose_category_id' => $request->purpose,
                'travel_details' => $request->reason,
                'travel_mode' => $request->travel,
                'from_dzongkhag_id' =>$request->f_dzongkhag,
                'from_gewog_id' => $request->f_gewog,
                'to_dzongkhag_id' => $request->t_dzongkhag,
                'to_gewog_id' => $request->t_gewog,
                'vaccine_status_id' => $request->vaccine[$key],
                'file_name' => $fileName,
                'expected_date' => $request->t_date,
                'r_status' =>'P',
            ]);
        }
        return redirect('/');
    
    }
}
