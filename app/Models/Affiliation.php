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
        'name', 'description', 'region_code', 'organisation_type', 'address',   'province_code', 'city_code', 'barangay'
    ];

    /**
     * Get the User that is member of the affiliation.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_affiliation')->withPivot('position', 'is_primary');
    }

    public function region()
    {
        return $this->belongsTo(Regions::class, 'region_code', 'code');
    }

    public function province()
    {
        return $this->belongsTo(Provinces::class, 'province_code', 'code');
    }

    public function city()
    {
        return $this->belongsTo(Cities::class, 'city_code', 'code');
    }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class, 'barangay', 'code');
    }
}
