<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activities';

    protected $fillable = [
        'owner',
        'target_id',
        'title',
        'success_indicator',
        'location' ,
        'remarks' ,
        'plan_b',
        'support_request' ,
        'support_from_whom' ,
        'support_how_much' ,
        'support_when_needed' ,
        'target_start' ,
        'target_end' ,
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'owner');
    }

    public function target()
    {
        return $this->belongsTo(Target::class, 'target_id');
    }
}
