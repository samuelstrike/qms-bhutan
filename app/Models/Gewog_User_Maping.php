<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gewog_User_Maping extends Model
{
    use HasFactory;
    protected $table = 'gewog_user_mappings';

    protected $fillable =[
        'user_id', 'dzongkhag_id', 'gewog_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
