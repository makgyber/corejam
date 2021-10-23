<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table='posts';

    protected $fillable=[
        'title', 'slug', 'subtitle', 'tldr', 'content', 'status', 'image_link'
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}
