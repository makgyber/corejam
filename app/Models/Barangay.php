<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    use HasFactory;

    protected $table = 'barangays';
    protected $fillable = ['code', 'name'];

    public function city()
    {
        return $this->belongsTo('App\Models\Cities', 'city_code', 'code');
    }
}

