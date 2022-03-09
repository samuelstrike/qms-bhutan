<?php

namespace App\Http\Controllers\Quaraintine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quanaintine_Facility;
use App\Models\Dzongkhag;

class QuaraintineController extends Controller
{
    public function index()
    {
        $dzongkhag = Dzongkhag::all();
        $facility = Quanaintine_Facility::all();
        return view('quaraintine.index',[
            'facility'=>$facility,
            'dzongkhag'=>$dzongkhag
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'facility_name' => 'bail|required|unique:quarantine_facilities',
            'capacity' => 'required|numeric',
            'dzongkhag' =>'required',
            'gewog' =>'required',
        ]);

        $facility = new Quanaintine_Facility();
        $facility->facility_name = $request->facility_name;
        $facility->dzongkhag_id = $request->dzongkhag;
        $facility->gewog_id = $request->gewog;
        $facility->capacity = $request->capacity;

        $facility->save();
        
        return redirect()->back();
    }
}
