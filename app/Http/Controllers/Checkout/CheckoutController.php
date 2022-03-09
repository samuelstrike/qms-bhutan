<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CheckoutController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $check_out_list = DB::table('registrations')
        ->join('gewog_user_mappings','registrations.from_gewog_id','=','gewog_user_mappings.gewog_id')
        
        ->join('dzongkhags','registrations.to_dzongkhag_id', '=', 'dzongkhags.id')
        ->join('gewogs', 'registrations.to_gewog_id', '=', 'gewogs.id')
        ->join('vaccination_status','registrations.vaccine_status_id', '=','vaccination_status.id')
        ->join('purpose_categories','registrations.purpose_category_id', '=','purpose_categories.id')
        ->join('nationalities','registrations.nationality_id', '=', 'nationalities.id')
        ->join('checkins','registrations.id','checkins.registration_id')
        ->select('registrations.*','dzongkhags.Dzongkhag_Name','gewogs.gewog_name','nationalities.nationality','purpose_categories.category_name','checkins.registration_id','vaccination_status.dose_name')
        ->where('registrations.r_status','A')
        ->get();

        return view('checkout.index',['check_out_list'=>$check_out_list]);
        
    }

    public function verifyCheckout($ref_id)
    {
        $check_out = DB::table('registrations')
        ->join('gewog_user_mappings','registrations.from_gewog_id','=','gewog_user_mappings.gewog_id')
        ->join('dzongkhags','registrations.to_dzongkhag_id', '=', 'dzongkhags.id')
        ->join('gewogs', 'registrations.to_gewog_id', '=', 'gewogs.id')
        ->join('occupations', 'registrations.occupation_id', '=', 'occupations.id')
        ->join('purpose_categories','registrations.purpose_category_id', '=','purpose_categories.id')
        ->join('nationalities','registrations.nationality_id', '=', 'nationalities.id')
        ->join('checkins','registrations.id','checkins.registration_id')
        ->join('vaccination_status','registrations.vaccine_status_id', '=','vaccination_status.id')
        ->select('registrations.*','dzongkhags.Dzongkhag_Name','gewogs.gewog_name','nationalities.nationality','purpose_categories.category_name','checkins.registration_id','vaccination_status.dose_name','occupations.occupation_name')
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
        }
        else
        {
            $status_update = DB::table('registrations')
            ->where('id', $request->reg_id)
            ->update(['r_status' => 'I']);
        }
           

        return redirect('checkoutlist');
    }
}
