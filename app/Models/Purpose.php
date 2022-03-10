<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{
    use HasFactory;

    
    protected $table = 'purpose_categories';

    protected $primaryKey = 'id';

    public static function getName($id)
    {
        
        $purpose= Purpose::select('category_name')->where('id',$id)->get();
        return $purpose;
    }
}
