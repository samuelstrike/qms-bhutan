<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable =[
        
        'ref_id', 'nationality_id', 'has_cid','cid','name','gender','phone_no','present_address',
        'purpose_category_id','travel_details','travel_mode','from_dzongkhag_id','from_gewog_id',
        'to_dzongkhag_id','to_gewog_id','vaccine_status_id','r_status', 'occupation_id',
    ];

    public static function getStatus($value)
    {
        if($value=="P")
            return "Pending";
        else
        if($value=="A")
            return "Allocated";
        else
        if($value=="T")
            return "Transferred";
        else    
        if($value=="Re")
            return "Rejected";
        else    
        if($value=="C")
            return "Checked out";
        else    
            if($value=="I")
                return "Isolated";
            
    }

    public static function countReg($cid)
    {
        $count = DB::table('registrations')
                ->where('cid',$cid)
                ->distinct('ref_id')
                ->count();
        return $count;
    }

  
}
