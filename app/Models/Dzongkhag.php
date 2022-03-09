<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Dzongkhag extends Model
{
    use HasFactory;

    protected $fillable = [
        'Dzongkhag_Name'
    ];

    public function gewogs()
    {
        return $this->hasMany(Gewog::class);
    }

    public static function getDzongkhag($uid)
    {
        $dzo = DB::table('dzongkhags')
                    ->join('gewog_user_mappings','dzongkhags.id', '=', 'gewog_user_mappings.dzongkhag_id')
                    ->where('gewog_user_mappings.user_id',$uid)
                    ->select('dzongkhags.*')->distinct()->get();
                    return $dzo;
                
               
                   
            
      
        
    }
}
