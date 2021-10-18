<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    use HasFactory;
    protected $table="provinces";

    public function region()
    {
        return $this->belongsTo('App\Models\Regions', 'code', 'region_code');
    }
}
