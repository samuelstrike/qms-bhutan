<?php

namespace App\Http\Controllers\Transfer;
use App\Models\Transfer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class TransferController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $user_id=$user->id;

        $transfer_list = Transfer::join('registrations','registrations.id','=','transfers.registration_id')
        ->join('gewog_user_mappings','transfers.gewog_id','=','gewog_user_mappings.gewog_id')
        ->join('vaccination_status','registrations.vaccine_status_id', '=','vaccination_status.id')
        ->join('purpose_categories','registrations.purpose_category_id', '=','purpose_categories.id')
        ->select('registrations.*','purpose_categories.category_name','transfers.registration_id','vaccination_status.dose_name')
        ->where('registrations.r_status','T')
        ->where('gewog_user_mappings.user_id',$user_id)
        ->get();

        return view('transfer.index',['transferred_list'=>$transfer_list]);
        
    }
}
