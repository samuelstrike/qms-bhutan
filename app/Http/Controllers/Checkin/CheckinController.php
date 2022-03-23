<?php

namespace App\Http\Controllers\Checkin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Registration;
use App\Models\Dzongkhag;
use App\Models\Gewog;
use App\Models\Quaraintine_Facility;
use App\Models\Gewog_User_Maping;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator; 
use Carbon\Carbon;

class CheckinController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user();
        $user_id=$user->id;
        $geo = DB::table('gewog_user_mappings')->where('user_id',$user_id)->pluck('gewog_id');
        $check_in_list = DB::table('registrations')
        ->whereIn('registrations.from_gewog_id',$geo)
        ->where('registrations.r_status','P')
        ->select('registrations.*')
        ->get();
        return view('checkin.index',['check_in_list'=>$check_in_list]);
    }

    public function verify($ref_id)
    {   
        $user = Auth::user();
        $user_id=$user->id;
        $check_in_list = DB::table('registrations')
       ->join('occupations', 'registrations.occupation_id', '=', 'occupations.id')
        ->join('purpose_categories','registrations.purpose_category_id', '=','purpose_categories.id')
        ->join('nationalities','registrations.nationality_id', '=', 'nationalities.id')
        ->join('vaccination_status','registrations.vaccine_status_id', '=','vaccination_status.id')
        ->select('registrations.*','nationalities.nationality','purpose_categories.category_name','vaccination_status.dose_name','occupations.occupation_name')
        ->where('registrations.ref_id',$ref_id)
       
        ->get();
        return view('checkin.allocate',[
            'check_in_list' =>$check_in_list
              
        ]);
    }

    public function allocate(Request $request)
    {
        $ref = $request->ref_id;
        $reg_id = Registration::where('ref_id',$ref)->get();
        $action = $request->selectaction;
        $this->validate($request, [
            'checkin_dt'=>'required',
        ]);
        
       
        if($action=="Allocate")
        {
            
            foreach($reg_id as $rid)
                {
                    DB::table('checkins')->insert([
                        'registration_id' =>$rid->id,
                        'facility_id' => $request->facility,
                        'room_no'   => 1,
                        'no_of_days' => $request->days,
                        'funding' => $request->fund,
                        'check_in_date' =>Carbon::parse($request->checkin_dt)->format('Y-m-d'), 

                    ]);
                }

            $status_update = DB::table('registrations')
              ->where('ref_id', $ref)
              ->update(['r_status' => 'A']);

              return redirect()->route('checkin')
              ->with('flash_message',
              'Allocated Quaraintine Center');
          
               
        }
           
        else
        if($action=="Transfer")
        {
            foreach($reg_id as $rid)
                {
                    DB::table('transfers')
                    ->updateOrInsert(
                        ['registration_id'=>$rid->id],
                    [
                        'registration_id' =>$rid->id,
                        'dzongkhag_id' => $request->t_dzongkhag,
                        'gewog_id'   => $request->t_gewog,
                        'remarks' => $request->remarks
                    ]);
                   
                }

            $status_update = DB::table('registrations')
              ->where('ref_id', $ref)
              ->update(['r_status' => 'T']);

              return redirect()->route('transferlist')
              ->with('flash_message',
              'Transferred');
          
              
            
        }
        else
        {
            $status_update = DB::table('registrations')
            ->where('ref_id', $ref)
            ->update(['r_status' => 'Re']);

            return redirect()->route('checkin')
            ->with('flash_message',
            'Request rejected!');
        
           
        }
      
       
       
    }

    function downloadFile($file_name){
        $myFile = public_path('uploads/'.$file_name);
    	return response()->download($myFile);
    }
}
