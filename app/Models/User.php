<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cmgmyr\Messenger\Traits\Messagable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use HasRoles;
    use HasFactory, Messagable;
    
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'first_name', 'middle_name', 'last_name', 'password', 'menuroles',
        'contact_number', 'skillsets', 'is_registered_voter', 'region_code', 'province_code', 
        'city_code', 'barangay', 'street', 'recommended_date', 'birthday',
        'business_type', 'business_location', 'capitalization', 'created_by'
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
        return $this->belongsToMany(Affiliation::class, 'user_affiliation')->withPivot('position', 'is_primary');
    }

    public function region()
    {
        return $this->hasOne(Regions::class, 'code', 'region_code');
    }

    public function province()
    {
        return $this->belongsTo(Provinces::class, 'province_code', 'code');
    }

    public function city()
    {
        return $this->belongsTo(Cities::class, 'city_code', 'code');
    }

    public function canManageBinshopsBlogPosts()
    {
        // Enter the logic needed for your app.
        // Maybe you can just hardcode in a user id that you
        //   know is always an admin ID?

        if (   strpos($this->menuroles,"admin") ){

           // return true so this user CAN edit/post/delete
           // blog posts (and post any HTML/JS)

           return true;
        }

        // otherwise return false, so they have no access
        // to the admin panel (but can still view posts)

        return false;
    }
}
