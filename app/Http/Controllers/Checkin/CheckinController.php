<?php

namespace App\Http\Controllers\Checkin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Dzongkhag;
use App\Models\Gewog;
use App\Models\Quaraintine_Facility;
use App\Models\Gewog_User_Maping;

use Illuminate\Support\Facades\DB;


class CheckinController extends Controller
{
    public function index()
    {
        $check_in_list = DB::table('registrations')
                            ->join('gewog_user_mappings','registrations.from_gewog_id','=','gewog_user_mappings.gewog_id')
                            ->join('dzongkhags','registrations.from_dzongkhag_id', '=', 'dzongkhags.id')
                            ->join('gewogs', 'registrations.from_gewog_id', '=', 'gewogs.id')
                            ->join('occupations', 'registrations.occupation_id', '=', 'occupations.id')
                            ->join('purpose_categories','registrations.purpose_category_id', '=','purpose_categories.id')
                            ->join('nationalities','registrations.nationality_id', '=', 'nationalities.id')
                            ->select('registrations.*','dzongkhags.Dzongkhag_Name','gewogs.gewog_name','nationalities.nationality','purpose_categories.category_name','occupations.occupation_name')
                            ->where('registrations.r_status','P')
                            ->get();
        return view('checkin.index',['check_in_list'=>$check_in_list]);
    }

    public function verify($ref_id)
    {
        $check_in_list = DB::table('registrations')
        ->join('gewog_user_mappings','registrations.from_gewog_id','=','gewog_user_mappings.gewog_id')
        ->join('dzongkhags','registrations.to_dzongkhag_id', '=', 'dzongkhags.id')
        ->join('gewogs', 'registrations.to_gewog_id', '=', 'gewogs.id')
        ->join('occupations', 'registrations.occupation_id', '=', 'occupations.id')
        ->join('purpose_categories','registrations.purpose_category_id', '=','purpose_categories.id')
        ->join('nationalities','registrations.nationality_id', '=', 'nationalities.id')
        ->join('vaccination_status','registrations.vaccine_status_id', '=','vaccination_status.id')
        ->select('registrations.*','dzongkhags.Dzongkhag_Name','gewogs.gewog_name','nationalities.nationality','purpose_categories.category_name','vaccination_status.dose_name','occupations.occupation_name')
        ->where('registrations.ref_id',$ref_id)
        // ->where('registrations.r_status','P')
        // ->orWhere('registrations.r_status','T')
       
        ->get();
        
        return view('checkin.allocate',['check_in_list' =>$check_in_list]);
    }

    public function allocate(Request $request)
    {
        $ref = $request->ref_id;
        $reg_id = Registration::where('ref_id',$ref)->get();
        $action = $request->selectaction;
        
        if($action=="Allocate")
        {
            
            foreach($reg_id as $rid)
                {
                    DB::table('checkins')->insert([
                        'registration_id' =>$rid->id,
                        'facility_id' => $request->facility,
                        'room_no'   => $request->room_no,
                        'no_of_days' => $request->days,
                        'funding' => $request->fund,
                        'check_in_date' => $request->checkin_dt
                    ]);
                }

            $status_update = DB::table('registrations')
              ->where('ref_id', $ref)
              ->update(['r_status' => 'A']);
               
        }
           
        else
        if($action=="Transfer")
        {
            foreach($reg_id as $rid)
                {
                    DB::table('transfers')->insert([
                        'registration_id' =>$rid->id,
                        'dzongkhag_id' => $request->t_dzongkhag,
                        'gewog_id'   => $request->t_gewog,
                        'remarks' => $request->remarks
                    ]);
                }

            $status_update = DB::table('registrations')
              ->where('ref_id', $ref)
              ->update(['r_status' => 'T']);
              
            
        }
        else
        {
            $status_update = DB::table('registrations')
            ->where('ref_id', $ref)
            ->update(['r_status' => 'Re']);
           
        }
      
        return redirect('checkin');
       
    }
}
