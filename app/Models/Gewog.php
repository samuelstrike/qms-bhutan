<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Gewog extends Model
{
    use HasFactory;

    public static function getGewog($did)
    {
        $geo = DB::table('gewogs')
            
                    ->where('dzongkhag_id',$did)
                    ->select('*')->get();
                    return $geo;
        
    }
}
