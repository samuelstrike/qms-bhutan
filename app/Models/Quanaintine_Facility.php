<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Dzongkhag;
class Quanaintine_Facility extends Model
{
    use HasFactory;
    protected $table = 'quarantine_facilities'; 

    public function dzongkhag($id)
    {
        $dzongkhag= Dzongkhag::select('Dzongkhag_name')->where('id',$id)->get();
        return $dzongkhag;
    }
}
