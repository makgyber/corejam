<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toolkit extends Model
{
    use HasFactory;

    protected $table = 'toolkit';

    protected $fillable = ['label', 'description', 'filepath'];

    
}
