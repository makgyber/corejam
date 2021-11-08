<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notes extends Model
{

    use HasFactory;

    protected $table = 'notes';

    protected $fillable = ['title', 'content', 'note_type', 'applies_to_date', 'users_id', 'status_id'];

    /**
     * Get the User that owns the Notes.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    /**
     * Get the Status that owns the Notes.
     */
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
