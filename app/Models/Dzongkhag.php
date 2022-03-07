<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
