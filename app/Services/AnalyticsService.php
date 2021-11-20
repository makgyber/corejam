<?php
namespace App\Services;

use App\Models\Affiliation;
use App\Models\Configuration;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AnalyticsService
{
    public function getAges()
    {
        $demoSql = 'count( *) as totalUsers,  
                    sum(if(timestampdiff( YEAR, birthday, now() ) <= 29, 1, 0)) as youth, 
                    sum(if(timestampdiff( YEAR, birthday, now() ) > 29 && timestampdiff( YEAR, birthday, now() ) < 60, 1, 0)) as adults, 
                    sum(if(timestampdiff( YEAR, birthday, now() ) >59, 1, 0)) as seniors
        ';

        $demographics = DB::table('users')
                            ->select(DB::raw($demoSql))
                            ->first();

        return $demographics;
    }

    public function getGenders()
    {
        $genderSql = 'count( *) as totalUsers,  
                sum(if(gender = "M", 1, 0)) as male, 
                sum(if(gender = "F", 1, 0)) as female
        ';                   
        $gender =  DB::table('users')
                    ->select(DB::raw($genderSql))
                    ->first();     

        return $gender;            
    }

    public function getRegionCounts()
    {
        $regionCounts = DB::table('regions')
                        ->select(DB::raw('regions.code, regions.name, count(users.id) as user_count'))
                        ->leftJoin('users', 'regions.code', '=', 'users.region_code')
                        ->groupBy(['regions.code','regions.name'])
                        ->orderBy('regions.code')
                        ->get();
        return $regionCounts;
    }

    public function getTotals()
    {
        $ages = $this->getAges();
        $genders = $this->getGenders();
                    
        $totals = [
            'organizations' => Affiliation::count(), 
            'targetRegistrations' => Configuration::select('value')->where('key', 'target.registrations')->first()->value, 
            'coordinators' => User::where('menuroles', 'coordinator')->count(), 
            'registered_voters' => User::where('is_registered_voter', 1)->count(),
            'total_users' => User::count(),
            'youth' => $ages->youth,
            'adults' => $ages->adults,
            'seniors' => $ages->seniors,
            'male'=>$genders->male,
            'female'=>$genders->female
        ];
        return $totals;
    }

    public function getCoordinatorActivities()
    {
        $coordinators = DB::table('activities')
                        ->select(DB::raw('activities.title, users.name, users.first_name,users.last_name, users.created_at,regions.name as region_name, activities.support_how_much, activities.disbursed, max(activities.updated_at)'))
                        ->leftJoin('users', 'activities.owner', '=', 'users.id')
                        ->leftJoin('regions', 'regions.code', '=', 'users.region_code')
                        ->groupBy(['activities.title','users.name', 'users.first_name','users.last_name','users.created_at','regions.name','activities.support_how_much', 'activities.disbursed',])
                        ->orderBy('activities.updated_at')
                        ->paginate(20);
        return $coordinators;
    }

    public function getRegionTargets()
    {
        $regionTargets = Configuration::where('key', 'like', 'region.%')->get();

        $regionStats = [];
        foreach($regionTargets as $regionTarget) {
            $regionStats[substr($regionTarget->key,-2)] = $regionTarget->value;
        }
        
        return $regionStats;
    }
}