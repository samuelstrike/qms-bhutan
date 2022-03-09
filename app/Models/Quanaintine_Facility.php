<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dzongkhag;
use App\Models\Checkin;
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
   
    
}
