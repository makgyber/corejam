<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'members';

    protected $fillable = [
        'first_name','last_name','email','affiliation_id', 'contact_number','skillsets','encoded_by'
    ];

     /**
     * Get the User that owns the Notes.
     */
    public function affiliation()
    {
        return $this->belongsTo('App\Models\Affiliation', 'affiliation_id')->withTrashed();
    }
}
