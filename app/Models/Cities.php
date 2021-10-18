<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;
    protected $table="cities";

    public function provinces()
    {
        return $this->belongsTo('App\Models\Provinces', 'province_code', 'code');
    }
}
