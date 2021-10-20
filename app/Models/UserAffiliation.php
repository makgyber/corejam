<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserAffiliation extends Model
{
    use HasFactory;
    protected $table = 'user_affiliation';


    protected $fillable = [
        'user_id', 'affiliation_id', 'position', 'is_primary'
    ];
}
