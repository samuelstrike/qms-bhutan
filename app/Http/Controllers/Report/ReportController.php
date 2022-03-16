<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    public function index()
    {
        return view('report.index');
    }
    public function generate(Request $request)
    {
        $f_date = $request->f_date .' 00:00:00';
        $t_date = $request->t_date .' 23:59:59';
        $dzo = $request->dzongkhag;

       //dd($t_date);

        $report = DB::table('registrations')
                    ->select('*')
                    ->when($request->get('dzongkhag') == 0, function ($query) use ($dzo) {
                        $query->where('from_dzongkhag_id','<>',0);
                        }, function ($query) use ($dzo){
                            $query->where('from_dzongkhag_id',$dzo);
                        })
                        ->when($request->get('category') ==0, function ($query) {
                            //$query->where('r_status','A');
                            }, function ($query) {
                                $query->whereIn('id',DB::table('checkins')->select('registration_id')->get());
                            })
                            ->when($request->get('gender') =="Male", 
                            function ($query) {
                                $query->where('gender','Male');
                                }, function ($query) {
                                    $query->where('gender','Female');
                                })
                       
                       ->whereBetween('updated_at',[$f_date,$t_date])
                        ->get();
            return view('report.index',['reg'=>$report]);
       
                                

 
    }  
}
