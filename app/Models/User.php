<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use HasRoles;
    use HasFactory;
    
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'first_name', 'last_name', 'password', 'menuroles','contact_number', 'skillsets', 'is_registered_voter',
        'region_code', 'province_code', 'city_code', 'barangay', 'street', 'recommended_date'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'deleted_at'
    ];

    protected $attributes = [ 
        'menuroles' => 'coordinator',
        'contact_number' => '', 
        'skillsets'=> '',
        'is_registered_voter'=> 1,
        'region_code'=> '',
        'province_code'=> '',
        'city_code'=> '',
        'barangay'=> '',
        'street'=> '',
        'recommended_date'=> '',
    ];


    /**
     * Get the User that is member of the affiliation.
     */
    public function affiliations()
    {
        return $this->belongsToMany(Affiliation::class, 'user_affiliation');
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
}
