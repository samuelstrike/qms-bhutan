<?php

namespace App\Http\Controllers\Transfer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransferController extends Controller
{
    public function index()
    {
        $transfer_list = DB::table('registrations')
        ->join('gewog_user_mappings','registrations.from_gewog_id','=','gewog_user_mappings.gewog_id')
        
        ->join('dzongkhags','registrations.to_dzongkhag_id', '=', 'dzongkhags.id')
        ->join('gewogs', 'registrations.to_gewog_id', '=', 'gewogs.id')
        ->join('vaccination_status','registrations.vaccine_status_id', '=','vaccination_status.id')
        ->join('purpose_categories','registrations.purpose_category_id', '=','purpose_categories.id')
        ->join('nationalities','registrations.nationality_id', '=', 'nationalities.id')
        ->join('checkins','registrations.id','checkins.registration_id')
        ->select('registrations.*','dzongkhags.Dzongkhag_Name','gewogs.gewog_name','nationalities.nationality','purpose_categories.category_name','checkins.registration_id','vaccination_status.dose_name')
        ->where('registrations.r_status','T')
        ->get();

        return view('transfer.index',['transferred_list'=>$transfer_list]);
        
    }
}
