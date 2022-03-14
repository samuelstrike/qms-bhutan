<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class CheckoutController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user();
        $user_id=$user->id;

        $geo_id = DB::table('gewog_user_mappings')->where('user_id',$user_id)->pluck('gewog_id');
        $fid = DB::table('quarantine_facilities')->whereIn('gewog_id',$geo_id)->pluck('id');
       
        $get_rid = DB::table('checkins')->whereIn('facility_id',$fid)->pluck('registration_id');
        $check_out_list = DB::table('registrations')->whereIn('id',$get_rid)->where('r_status','A')->get();

        return view('checkout.index',['check_out_list'=>$check_out_list]);
        
    }

    public function verifyCheckout($ref_id)
    {
        $user = Auth::user();
        $user_id=$user->id;
        $check_out = DB::table('registrations')
        
        ->join('occupations', 'registrations.occupation_id', '=', 'occupations.id')
        ->join('purpose_categories','registrations.purpose_category_id', '=','purpose_categories.id')
        ->join('nationalities','registrations.nationality_id', '=', 'nationalities.id')
        ->join('vaccination_status','registrations.vaccine_status_id', '=','vaccination_status.id')
        ->select('registrations.*','nationalities.nationality','purpose_categories.category_name','vaccination_status.dose_name','occupations.occupation_name')
        ->where('registrations.r_status','A')
        ->where('registrations.id',$ref_id)
        ->get();
        return view('checkout.checkout',['check_out'=>$check_out]);
    }

    public function checkout(Request $request)
    {
      
        DB::table('checkouts')->insert([
            'registration_id' =>$request->reg_id,
            'covid_test_type' => $request->test,
            'test_result'   => $request->result,
            'status' => $request->select_action,
            'check_out_date' => $request->checkout_dt,
            'remarks' => $request->remarks
           
        ]);

        if($request->select_action=="Checkout")
        {
            $status_update = DB::table('registrations')
            ->where('id', $request->reg_id)
            ->update(['r_status' => 'C']);

            return redirect()->route('checkoutlist')
            ->with('flash_message',
            'Checkout Successful!');
        }
        else
        {
            $status_update = DB::table('registrations')
            ->where('id', $request->reg_id)
            ->update(['r_status' => 'I']);

            return redirect()->route('checkoutlist')
            ->with('flash_message',
            'Moved to Isolation Center');
        }
           

        
    }
}
