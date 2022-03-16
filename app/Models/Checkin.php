<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Checkin extends Model
{
    use HasFactory;

    public static function dzongkhag($id)
    {
        $dzongkhag= Dzongkhag::select('Dzongkhag_name')->where('id',$id)->get();
        return $dzongkhag;
    }
    public static function gewog($id)
    {
        $gewog= Gewog::select('gewog_name')->where('id',$id)->get();
        return $gewog;
    }

    public static function getDate($id)
    {
        $cdate = DB::table('checkins')->where('registration_id',$id)->pluck('check_in_date')->last();
        return $cdate;
    }
   
}
