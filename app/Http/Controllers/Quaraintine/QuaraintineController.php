<?php

namespace App\Http\Controllers\Quaraintine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quanaintine_Facility;
use App\Models\Dzongkhag;
use App\Models\Checkin;


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
    public function destroy($fid)
    {
        $checkin=Checkin::where('facility_id',$fid)->count();
        
        if($checkin<1)
        {
            $qf = Quanaintine_Facility::findOrFail($fid);
            $qf->delete();
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        $qf = Quanaintine_Facility::findOrFail($id);
        return view('quaraintine.edit', compact('qf'));
    }

    public function update(Request $request,$id)
    {
        $qf = Quanaintine_Facility::findOrFail($id);
        $qf->facility_name = $request->fname;
        $qf->capacity = $request->capacity;
        $qf->dzongkhag_id = $request->dzongkhag;
        $qf->gewog_id = $request->gewog;
        $qf->save();

        return redirect()->route('facility')
        ->with('flash_message',
         'Quaraintine Facility '. $qf->facility_name.' updated!');
    }
}
