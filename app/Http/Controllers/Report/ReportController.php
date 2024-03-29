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
        $gender=$request->gender;
        $cat = $request->category;
        $nat = $request->cat;

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
                            }, function ($query) use ($cat) {
                                $query->where('r_status',$cat)->get();
                            })
                            ->when($request->get('gender') =="All", 
                            function ($query) {
                                
                                }, 
                                function ($query) use ($gender){
                                    $query->where('gender',$gender);
                                })
                                ->when($request->get('cat') =="All", 
                            function ($query) {
                                
                                }, 
                                function ($query) use ($nat){
                                    $query->where('has_cid',$nat);
                                })
                       
                       ->whereBetween('updated_at',[$f_date,$t_date])
                        ->get();
            return view('report.index',['reg'=>$report]);
       
    }  

    public function qfReport()
    {
        return view('report.qfreport');
    }

    public function qfGenerate(Request $request)
    {
        $dzo = $request->dzongkhag;
        
        $facility = DB::table('quarantine_facilities')
                    ->select('*')
                    ->when($request->get('dzongkhag') == 0, function ($query) use ($dzo) {
                        $query->where('dzongkhag_id','<>',0);
                        }, function ($query) use ($dzo){
                            $query->where('dzongkhag_id',$dzo);
                        })
                        ->get();
        return view('report.qfreport',['facility'=>$facility]);
    }
}
