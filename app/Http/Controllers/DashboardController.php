<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function dashboard()
    {
        
       
                
        $user = Auth::user();
        $user_id=$user->id;

        $geo = DB::table('gewog_user_mappings')->where('user_id',$user_id)->pluck('gewog_id');
        $fid = DB::table('quarantine_facilities')->whereIn('gewog_id',$geo)->pluck('id');
        $capacity = DB::table('quarantine_facilities')->whereIn('id',$fid)->sum('capacity');
        $get_rid = DB::table('checkins')->whereIn('facility_id',$fid)->pluck('registration_id');
        $get_fid = DB::table('registrations')->whereIn('id',$get_rid)->where('r_status','A')->count();
        $total_transferrred = DB::table('registrations')->whereIn('id',DB::table('transfers')->select('registration_id'))->whereIn('from_gewog_id',$geo)->count();
        $transferred_in = DB::table('transfers')->whereIn('gewog_id',$geo)->count();
        
        $vacant = $capacity - $get_fid;
        $total_facility =count($fid);

       
        $reg_count = DB::table('registrations')
                    ->whereIn('from_gewog_id',$geo)
                    ->where('r_status','P')
                    ->count();
        
        $transfer_count = DB::table('transfers')
                    ->join('registrations','transfers.registration_id', '=', 'registrations.id')
                    ->whereIn('transfers.gewog_id',$geo)
                    ->where('registrations.r_status','T')
                    ->count();

        
        $total_reg = DB::table('registrations')
                    ->whereIn('from_gewog_id',$geo)
                    ->count();

        $total_quaraintined = DB::table('checkins')
                                ->join('registrations', 'registrations.id', '=', 'checkins.registration_id')
                                ->whereIn('checkins.facility_id',$fid)
                                ->where('registrations.r_status', '<>','A')
                                ->count();
      
        return view('dashboard.main',[
            'reg_count'=>$reg_count+$transfer_count,
            't_count' => $vacant,  
            'a_count'   =>$get_fid,
            'r_count'   =>$total_reg,
            'capacity' =>$capacity,
            'total_facility' => $total_facility,
            'total_transferrred' =>$total_transferrred,
            'transferred_in' => $transferred_in,
            'total_quaraintined' =>$total_quaraintined
        ]);
    }
}
