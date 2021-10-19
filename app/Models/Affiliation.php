<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Affiliation extends Model
{
    use HasFactory;
    protected $table = 'affiliations';

    protected $fillable = [
        'name', 'description', 'region_code', 'organisation_type', 'address',   'province_code', 'city_code'
    ];

    /**
     * Get the User that is member of the affiliation.
     */
    public function user()
    {
        return $this->belongsToMany(User::class, 'user_affiliation');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_code', 'code');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_code', 'code');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_code', 'code');
    }
}
