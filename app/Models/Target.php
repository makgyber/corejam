<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    use HasFactory;

    protected  $table = 'targets';

    protected $fillable=['owner', 'tldr', 'objective'];


    public function user()
    {
        return $this->belongsTo(User::class, 'owner');
    }

    public function activities()
    {
        return $this->hasMany(Activity::class, 'target_id');
    }
}
