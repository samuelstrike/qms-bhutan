<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dzongkhag;
use App\Models\Checkin;
use Illuminate\Support\Facades\DB;
class Quanaintine_Facility extends Model
{
    use HasFactory;
    protected $table = 'quarantine_facilities'; 

    protected $fillable=[
        'facility_name',
        'dzongkhag_id',
        'gewog_id',
        'capacity'
    ];

    public function dzongkhag($id)
    {
        $dzongkhag= Dzongkhag::select('Dzongkhag_name')->where('id',$id)->get();
        return $dzongkhag;
    }
    public static function gewog($id)
    {
        $gewog= Gewog::select('gewog_name')->where('id',$id)->get();
        return $gewog;
    }

    public static function getFacility($rid)
    {
        $facility_name = DB::table('quarantine_facilities')
                        ->join('checkins', 'quarantine_facilities.id', '=','checkins.facility_id')
                        ->where('checkins.registration_id',$rid)
                        ->pluck('quarantine_facilities.facility_name')->last();
        return $facility_name;
    }
   
    
}
