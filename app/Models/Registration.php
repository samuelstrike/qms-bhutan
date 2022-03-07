<?php

namespace App\Models;

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

  
}
