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
        $reg_count = DB::table('registrations')
                    ->join('gewog_user_mappings','registrations.from_gewog_id','=','gewog_user_mappings.gewog_id')
                    ->where('registrations.r_status','P')
                    ->where('gewog_user_mappings.user_id',$user_id)
                    ->count();
        
        $transfer_count = DB::table('transfers')
                    ->join('gewog_user_mappings','transfers.gewog_id','=','gewog_user_mappings.gewog_id')
                    ->join('registrations','transfers.registration_id', '=', 'registrations.id')
                    ->where('gewog_user_mappings.user_id',$user_id)
                    ->where('registrations.r_status','T')
                    ->count();

        $allocated = DB::table('registrations')
                    ->join('gewog_user_mappings','registrations.from_gewog_id','=','gewog_user_mappings.gewog_id')
                    ->where('registrations.r_status','A')
                    ->where('gewog_user_mappings.user_id',$user_id)
                    ->count();
        $total_reg = DB::table('registrations')
                    ->join('gewog_user_mappings','registrations.from_gewog_id','=','gewog_user_mappings.gewog_id')
                    ->where('gewog_user_mappings.user_id',$user_id)
                    ->count();
      
        return view('dashboard.main',[
            'reg_count'=>$reg_count,
            't_count' => $transfer_count,  
            'a_count'   =>$allocated,
            'r_count'   =>$total_reg  
        ]);
    }
}
