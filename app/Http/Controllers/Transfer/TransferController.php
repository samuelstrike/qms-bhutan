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
        $geo = DB::table('gewog_user_mappings')->where('user_id',$user_id)->pluck('gewog_id');
        $transfer_list = DB::table('registrations')
        ->join('transfers', 'registrations.id', '=', 'transfers.registration_id')
        ->whereIn('transfers.gewog_id',$geo)
        ->where('registrations.r_status','T')
        ->select('registrations.*')
        ->get();

        return view('transfer.index',['transferred_list'=>$transfer_list]);
        
    }
}
