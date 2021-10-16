<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliation extends Model
{
    use HasFactory;
    protected $table = 'affiliations';

    protected $fillable = [
        'name', 'description', 'position', 'organisation_type', 'address',   'users_id'
    ];

    /**
     * Get the User that owns the Notes.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'users_id')->withTrashed();
    }
}
