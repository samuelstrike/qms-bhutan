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
        

        // if($request->dzongkhag == 0 && $request->category==0 && $request->occupation == 0)
        // {
        //     $reg = Db::table('registrations')->get();
        // }
        // if($request->dzongkhag == 0)
        // {
            $reg = Db::table('registrations')
            
            ->where('from_dzongkhag_id',$request->dzongkhag)
            ->get();
            return view('report.index',['reg'=>$reg]);
        // }
        // if($request->category==0)
        // {
        //     $reg = Db::table('registrations')
        //     ->where('from_dzongkhag_id',$request->dzongkhag)
        //     ->where('occupation_id',$request->occupation)
        //     ->get();
        // }
        // if($request->occupation==0)
        // {
        //     $reg = Db::table('registrations')
        //     ->where('from_dzongkhag_id',$request->dzongkhag)
        //     ->where('purpose_category_id',$request->category)
        //     ->get();
        // }

        



        
    }  
}
