<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
