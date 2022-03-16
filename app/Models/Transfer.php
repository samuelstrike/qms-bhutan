<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transfer extends Model
{
    use HasFactory;

    public static function getDzongkhag($id)
    {
        $dzo = DB::table('dzongkhags')
                ->join('transfers', 'dzongkhags.id', '=', 'transfers.dzongkhag_id')
                ->where('transfers.registration_id',$id)
                ->pluck('dzongkhags.Dzongkhag_Name')->last();
        return $dzo;
    }
    
}
