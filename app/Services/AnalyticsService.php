<?php
namespace App\Services;

use App\Models\Affiliation;
use App\Models\Configuration;
use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AnalyticsService
{
    public function getBusinessOwners($params = null)
    {
        $businessOwners =User::where('business_type', '!=', 'null');
        if (isset($params['barangay'])) {
            $businessOwners->where('barangay', $params['barangay']);
        } else if (isset($params['city_code'])) {
            $businessOwners->where('city_code', $params['city_code']);
        } else if (isset($params['province_code'])) {

            if($params['province_code'] == '1300') {
                $businessOwners->where('province_code', 'like', '13%');
            } else {
                $businessOwners->where('province_code', $params['province_code']);
            }
            
        } else if (isset($params['region_code'])) {
            $businessOwners->where('region_code', $params['region_code']);
        }
        return $businessOwners->count();
    }

    public function getGlobalBusinessOwners($params = null)
    {
        $businessOwners =User::where('business_type', '!=', 'null');
        if (isset($params['world_city_id'])) {
            $businessOwners->where('world_city_id', $params['world_city_id']);
        } else if (isset($params['state_id'])) {
            $businessOwners->where('state_id', $params['state_id']); 
        } else if (isset($params['country_id'])) {
            $businessOwners->where('country_id', $params['country_id']);
        }else if(isset($params['subregion'])) {
            $businessOwners->whereIn('country_id', Country::select('id')->where('subregion', $params['subregion']))->get();
        }
        return $businessOwners->count();
    }

    public function getCoopMembers($params = null)
    {
        $coopMembers =User::where('coop_member', 'yes');
        if (isset($params['barangay'])) {
            $coopMembers->where('barangay', $params['barangay']);
        } else if (isset($params['city_code'])) {
            $coopMembers->where('city_code', $params['city_code']);
        } else if (isset($params['province_code'])) {

            if($params['province_code'] == '1300') {
                $coopMembers->where('province_code', 'like', '13%');
            } else {
                $coopMembers->where('province_code', $params['province_code']);
            }
            
        } else if (isset($params['region_code'])) {
            $coopMembers->where('region_code', $params['region_code']);
        }
        return $coopMembers->count();
    }

    public function getGlobalCoopMembers($params = null)
    {
        $coopMembers =User::where('coop_member', 'yes');
        if (isset($params['world_city_id'])) {
            $coopMembers->where('world_city_id', $params['world_city_id']);
        } else if (isset($params['state_id'])) {
            $coopMembers->where('state_id', $params['state_id']); 
        } else if (isset($params['country_id'])) {
            $coopMembers->where('country_id', $params['country_id']);
        }else if(isset($params['subregion'])) {
            $coopMembers->whereIn('country_id', Country::select('id')->where('subregion', $params['subregion']))->get();
        }
        return $coopMembers->count();
    }

    public function getAges($params=null)
    {
        $demoSql = 'count( *) as totalUsers,  
                    sum(if(timestampdiff( YEAR, birthday, now() ) <= 29, 1, 0)) as youth, 
                    sum(if(timestampdiff( YEAR, birthday, now() ) > 29 && timestampdiff( YEAR, birthday, now() ) < 60, 1, 0)) as adults, 
                    sum(if(timestampdiff( YEAR, birthday, now() ) >59, 1, 0)) as seniors
        ';

        $demographics = DB::table('users')->select(DB::raw($demoSql));

        if (isset($params['barangay'])) {
            $demographics->where('barangay', $params['barangay']);
        } else if (isset($params['city_code'])) {
            $demographics->where('city_code', $params['city_code']);
        } else if (isset($params['province_code'])) {

            if($params['province_code'] == '1300') {
                $demographics->where('province_code', 'like', '13%');
            } else {
                $demographics->where('province_code', $params['province_code']);
            }
            
        } else if (isset($params['region_code'])) {
            $demographics->where('region_code', $params['region_code']);
        }

        return $demographics->first();
    }

    public function getGlobalAges($params=null)
    {
        $demoSql = 'count( *) as totalUsers,  
                    sum(if(timestampdiff( YEAR, birthday, now() ) <= 29, 1, 0)) as youth, 
                    sum(if(timestampdiff( YEAR, birthday, now() ) > 29 && timestampdiff( YEAR, birthday, now() ) < 60, 1, 0)) as adults, 
                    sum(if(timestampdiff( YEAR, birthday, now() ) >59, 1, 0)) as seniors
        ';

        $demographics = DB::table('users')->select(DB::raw($demoSql));

        if (isset($params['world_city_id'])) {
            $demographics->where('world_city_id', $params['world_city_id']);
        } else if (isset($params['state_id'])) {
            $demographics->where('state_id', $params['state_id']); 
        } else if (isset($params['country_id'])) {
            $demographics->where('country_id', $params['country_id']);
        }else if(isset($params['subregion'])) {
            $demographics->whereIn('country_id', Country::select('id')->where('subregion', $params['subregion']))->get();
        }

        return $demographics->first();
    }

    public function getGlobalGenders($params=null)
    {
        $genderSql = 'count( *) as totalUsers,  
                sum(if(gender = "M", 1, 0)) as male, 
                sum(if(gender = "F", 1, 0)) as female
        ';                   
        $gender =  DB::table('users')
                    ->select(DB::raw($genderSql));

        if (isset($params['world_city_id'])) {
            $gender->where('world_city_id', $params['world_city_id']);
        } else if (isset($params['state_id'])) {
            $gender->where('state_id', $params['state_id']); 
        } else if (isset($params['country_id'])) {
            $gender->where('country_id', $params['country_id']);
        } else if(isset($params['subregion'])) {
            $gender->whereIn('country_id', Country::select('id')->where('subregion', $params['subregion']))->get();
        }
                    
        return $gender->first();               
    }

    public function getGenders($params=null)
    {
        $genderSql = 'count( *) as totalUsers,  
                sum(if(gender = "M", 1, 0)) as male, 
                sum(if(gender = "F", 1, 0)) as female
        ';                   
        $gender =  DB::table('users')
                    ->select(DB::raw($genderSql));

        if (isset($params['barangay'])) {
            $gender->where('barangay', $params['barangay']);
        } else if (isset($params['city_code'])) {
            $gender->where('city_code', $params['city_code']);
        } else if (isset($params['province_code'])) {
            if($params['province_code'] == '1300') {
                $gender->where('province_code', 'like', '13%');
            } else {
                $gender->where('province_code', $params['province_code']);
            }
            
        } else if (isset($params['region_code'])) {
            $gender->where('region_code', $params['region_code']);
        }
                    
        return $gender->first();               
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

    public function getGlobalLocationCounts($params)
    {

        if(!isset($params)) {
            return $locationCounts = [];
        } else if(isset($params['subregion']) && !isset($params['country_id'])) {

            return $locationCounts = DB::table('countries')
                        ->select(DB::raw('countries.id, countries.name, count(users.id) as user_count'))
                        ->leftJoin('users', 'countries.id', '=', 'users.country_id')
                        ->where('countries.subregion', $params['subregion'])
                        ->groupBy(['countries.id','countries.name'])
                        ->orderBy('countries.name')
                        ->get();

        } else if(isset($params['subregion']) && isset($params['country_id']) && !isset($params['state_id'])) {

            return $locationCounts = DB::table('states')
                        ->select(DB::raw('states.id, states.name, count(users.id) as user_count'))
                        ->leftJoin('users', 'states.id', '=', 'users.state_id')
                        ->where('states.country_id', $params['country_id'])
                        ->groupBy(['states.id','states.name'])
                        ->orderBy('states.name')
                        ->get();

        } else if(isset($params['subregion']) && isset($params['country_id']) && isset($params['state_id']) &&  !isset($params['world_city_id'])) {
            return $locationCounts = DB::table('world_cities')
                        ->select(DB::raw('world_cities.id, world_cities.name, count(users.id) as user_count'))
                        ->leftJoin('users', 'world_cities.id', '=', 'users.world_city_id')
                        ->where('world_cities.state_id', $params['state_id'])
                        ->where('world_cities.country_id', $params['country_id'])
                        ->groupBy(['world_cities.id','world_cities.name'])
                        ->orderBy('world_cities.name')
                        ->get();
        } 

        return $locationCounts = [];
    }

    public function getLocationCounts($params)
    {

        if(!isset($params)) {
            return $locationCounts = [];
        } else if(isset($params['region_code']) && !isset($params['province_code'])) {

            return $locationCounts = DB::table('provinces')
                        ->select(DB::raw('provinces.code, provinces.name, count(users.id) as user_count'))
                        ->leftJoin('users', 'provinces.code', '=', 'users.province_code')
                        ->where('provinces.region_code', $params['region_code'])
                        ->groupBy(['provinces.code','provinces.name'])
                        ->orderBy('provinces.code')
                        ->get();

        } else if(isset($params['region_code']) && isset($params['province_code']) && !isset($params['city_code'])) {

            $locationCounts = DB::table('cities')
                        ->select(DB::raw('cities.code, cities.name, count(users.id) as user_count'))
                        ->leftJoin('users', 'cities.code', '=', 'users.city_code');

            if($params['province_code']=='1300') {
                $locationCounts->where('cities.code', 'like', '13%');
            } else {
                $locationCounts->where('cities.province_code', $params['province_code']);
            }
        
            return $locationCounts->groupBy(['cities.code','cities.name'])
                        ->orderBy('cities.code')
                        ->get();

        } else if(isset($params['region_code']) && isset($params['province_code']) && isset($params['city_code']) &&  !isset($params['barangay'])) {
            return $locationCounts = DB::table('barangays')
                        ->select(DB::raw('barangays.code, barangays.name, count(users.id) as user_count'))
                        ->leftJoin('users', 'barangays.code', '=', 'users.barangay')
                        ->where('barangays.city_code', $params['city_code'])
                        ->groupBy(['barangays.code','barangays.name'])
                        ->orderBy('barangays.code')
                        ->get();
        } 

        return $locationCounts = [];
    }

    public function getTotals($params=null)
    {
        $ages = $this->getAges($params);
        $genders = $this->getGenders($params);
                    
        $totals = [
            'targetRegistrations' => $this->getTargetRegistrations($params), 
            'coordinators' => $this->getCoordinatorCount($params), 
            'registered_voters' => $this->getRegisteredVoters($params),
            'total_users' => $this->getUserCount($params),
            'youth' => $ages->youth,
            'adults' => $ages->adults,
            'seniors' => $ages->seniors,
            'male'=>$genders->male,
            'female'=>$genders->female,
            'businessOwners'=>$this->getBusinessOwners($params),
            'coopMembers'=>$this->getCoopMembers($params) 
        ];
        return $totals;
    }

    public function getGlobalTotals($params=null)
    {
        $ages = $this->getGlobalAges($params);
        $genders = $this->getGlobalGenders($params);
                    
        $totals = [
            'targetRegistrations' => $this->getTargetRegistrations($params), 
            'coordinators' => $this->getGlobalCoordinatorCount($params), 
            'registered_voters' => $this->getGlobalRegisteredVoters($params),
            'total_users' => $this->getGlobalUserCount($params),
            'youth' => $ages->youth,
            'adults' => $ages->adults,
            'seniors' => $ages->seniors,
            'male'=>$genders->male,
            'female'=>$genders->female,
            'businessOwners'=>$this->getGlobalBusinessOwners($params),
            'coopMembers'=>$this->getGlobalCoopMembers($params) 
        ];
        return $totals;
    }

    public function getCoordinatorCount($params=null)
    {
        $users = User::where('menuroles', 'coordinator');

        if (isset($params['barangay'])) {
            $users->where('barangay', $params['barangay'])->count();
        } else if (isset($params['city_code'])) {
            $users->where('city_code', $params['city_code'])->count();
        } else if (isset($params['province_code'])) {

            if($params['province_code'] == '1300') {
                $users->where('province_code', 'like', '13%')->count();
            } else {
                $users->where('province_code', $params['province_code'])->count();
            }

        } else if (isset($params['region_code'])) {
            $users->where('region_code', $params['region_code'])->count();
        } 
 
        return $users->count();
    }

    public function getGlobalCoordinatorCount($params=null)
    {
        $users = User::where('menuroles', 'coordinator');

        if (isset($params['world_city_id'])) {
            $users->where('world_city_id', $params['world_city_id']);
        } else if (isset($params['state_id'])) {
            $users->where('state_id', $params['state_id']); 
        } else if (isset($params['country_id'])) {
            $users->where('country_id', $params['country_id']);
        } else if(isset($params['subregion'])) {
            $users->whereIn('country_id', Country::select('id')->where('subregion', $params['subregion']))->get();
        }
 
        return $users->count();
    }



    public function getTargetRegistrations($params=null)
    {
        $target = Configuration::select('value');

        if (isset($params['region_code'])) {
            $target->where('key', 'region.' . $params['region_code']);
        } else {
            $target->where('key', 'target.registrations');
        }

        return $target->first()->value;
    }

    public function getRegisteredVoters($params=null)
    {
        $users = User::where('is_registered_voter', 1);

        if (isset($params['barangay'])) {
            $users->where('barangay', $params['barangay']);
        } else if (isset($params['city_code'])) {
            $users->where('city_code', $params['city_code']);
        } else if (isset($params['province_code'])) {

            if($params['province_code'] == '1300') {
                $users->where('province_code', 'like', '13%');
            } else {
                $users->where('province_code', $params['province_code']);
            }
            
        } else if (isset($params['region_code'])) {
            $users->where('region_code', $params['region_code']);
        } 

        return $users->count();
    }

    public function getGlobalRegisteredVoters($params=null)
    {
        $users = User::where('is_registered_voter', 1);

        if (isset($params['world_city_id'])) {
            $users->where('world_city_id', $params['world_city_id']);
        } else if (isset($params['state_id'])) {
            $users->where('state_id', $params['state_id']); 
        } else if (isset($params['country_id'])) {
            $users->where('country_id', $params['country_id']);
        } else if(isset($params['subregion'])) {
            $users->whereIn('country_id', Country::select('id')->where('subregion', $params['subregion']))->get();
        }

        return $users->count();
    }

    public function getUserCount($params=null) 
    {

        if (isset($params['barangay'])) {
            return User::where('barangay', $params['barangay'])->count();
        } else if (isset($params['city_code'])) {
            return User::where('city_code', $params['city_code'])->count();
        } else if (isset($params['province_code'])) {

            if($params['province_code'] == '1300') {
                return User::where('province_code', 'like', '13%')->count();
            } else {
                return User::where('province_code', $params['province_code'])->count();
            }

        } else if (isset($params['region_code'])) {
            return User::where('region_code', $params['region_code'])->count();
        } 

        return User::count();
    }

    public function getGlobalUserCount($params=null) 
    {

        if (isset($params['world_city_id'])) {
            return User::where('world_city_id', $params['world_city_id'])->count();
        } else if (isset($params['state_id'])) {
            return User::where('state_id', $params['state_id'])->count(); 
        } else if (isset($params['country_id'])) {
            return User::where('country_id', $params['country_id'])->count();
        } else if(isset($params['subregion'])) {
            return User::whereIn('country_id', Country::select('id')->where('subregion', $params['subregion']))->count();
        }

        return User::count();
    }

    public function getCoordinatorActivities()
    {
 
        if(auth()->user()->hasRole(['site_admin','admin'])) {
            $coordinators = DB::table('activities')
                ->select(DB::raw('activities.title, users.name, users.first_name,users.last_name, users.image, users.created_at,regions.name as region_name, activities.support_how_much, activities.disbursed, max(activities.updated_at)'))
                ->leftJoin('users', 'activities.owner', '=', 'users.id')
                ->leftJoin('regions', 'regions.code', '=', 'users.region_code')
                ->groupBy(['activities.title','users.name', 'users.first_name','users.last_name','users.image','users.created_at','regions.name','activities.support_how_much', 'activities.disbursed',])
                ->orderBy('activities.updated_at')
                ->paginate(20);
        } else {
            $coordinators = DB::table('activities')
                ->select(DB::raw('activities.title, users.name, users.first_name,users.last_name, users.image, users.created_at,regions.name as region_name, activities.support_how_much, activities.disbursed, max(activities.updated_at)'))
                ->leftJoin('users', 'activities.owner', '=', 'users.id')
                ->leftJoin('regions', 'regions.code', '=', 'users.region_code')
                ->where('activities.owner', auth()->user()->id)
                ->groupBy(['activities.title','users.name', 'users.first_name','users.last_name','users.image','users.created_at','regions.name','activities.support_how_much', 'activities.disbursed',])
                ->orderBy('activities.updated_at')
                ->paginate(20);
        }
        
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

    public function getGlobalRegionCounts()
    {
        $globalRegionCounts = DB::table('countries')
                        ->select(DB::raw('countries.subregion, count(users.id) as user_count'))
                        ->leftJoin('users', 'countries.id', '=', 'users.country_id')
                        ->where('subregion', '!=', '')
                        ->groupBy(['countries.subregion'])
                        ->orderBy('countries.subregion')
                    
                        ->get();
        return $globalRegionCounts;
    }

    public function getGlobalAffiliationCounts($params=null)
    {
        $affiliationCounts = DB::table('affiliations')
                        ->select(DB::raw('affiliations.name, count(user_affiliation.user_id) as user_count'))
                        ->leftJoin('user_affiliation', 'affiliations.id', '=', 'user_affiliation.affiliation_id');

        if (isset($params['world_city_id'])) {
            $affiliationCounts = DB::table('affiliations')
                        ->select(DB::raw('affiliations.name, count(user_affiliation.user_id) as user_count'))
                        ->leftJoin('user_affiliation', 'affiliations.id', '=', 'user_affiliation.affiliation_id')
                        ->where('affiliations.world_city_id', $params['world_city_id'])
                        ->groupBy(['affiliations.name'])
                        ->orderBy('affiliations.name')
                        ->get();
        } else if (isset($params['state_id'])) {
            $affiliationCounts = DB::table('affiliations')
                        ->select(DB::raw('affiliations.name, count(user_affiliation.user_id) as user_count'))
                        ->leftJoin('user_affiliation', 'affiliations.id', '=', 'user_affiliation.affiliation_id')
                        ->where('affiliations.state_id', $params['state_id'])
                        ->groupBy(['affiliations.name'])
                        ->orderBy('affiliations.name')
                        ->get();
        } else if (isset($params['country_id'])) {

            $affiliationCounts = DB::table('affiliations')
                        ->select(DB::raw('affiliations.name, count(user_affiliation.user_id) as user_count'))
                        ->leftJoin('user_affiliation', 'affiliations.id', '=', 'user_affiliation.affiliation_id')
                        ->where('affiliations.country_id', $params['country_id'])
                        ->groupBy(['affiliations.name'])
                        ->orderBy('affiliations.name')
                        ->get();
            
        } else if (isset($params['subregion'])) {
            $affiliationCounts = DB::table('affiliations')
                        ->select(DB::raw('affiliations.name, count(user_affiliation.user_id) as user_count'))
                        ->leftJoin('user_affiliation', 'affiliations.id', '=', 'user_affiliation.affiliation_id')
                        ->whereIn('affiliations.country_id', Country::select('id')->where('subregion', $params['subregion'])->get()) 
                        ->groupBy(['affiliations.name'])
                        ->orderBy('affiliations.name')
                        ->get();
        } 
       
        return $affiliationCounts;
    }

    public function getAffiliationCounts($params=null)
    {
        $affiliationCounts = DB::table('affiliations')
                        ->select(DB::raw('affiliations.name, count(user_affiliation.user_id) as user_count'))
                        ->leftJoin('user_affiliation', 'affiliations.id', '=', 'user_affiliation.affiliation_id');

        if (isset($params['barangay'])) {
            $affiliationCounts = DB::table('affiliations')
                        ->select(DB::raw('affiliations.name, count(user_affiliation.user_id) as user_count'))
                        ->leftJoin('user_affiliation', 'affiliations.id', '=', 'user_affiliation.affiliation_id')
                        ->where('affiliations.barangay', $params['barangay'])
                        ->groupBy(['affiliations.name'])
                        ->orderBy('affiliations.name')
                        ->get();
        } else if (isset($params['city_code'])) {
            $affiliationCounts = DB::table('affiliations')
                        ->select(DB::raw('affiliations.name, count(user_affiliation.user_id) as user_count'))
                        ->leftJoin('user_affiliation', 'affiliations.id', '=', 'user_affiliation.affiliation_id')
                        ->where('affiliations.city_code', $params['city_code'])
                        ->groupBy(['affiliations.name'])
                        ->orderBy('affiliations.name')
                        ->get();
        } else if (isset($params['province_code'])) {

            if($params['province_code'] == '1300') {
                $affiliationCounts = DB::table('affiliations')
                        ->select(DB::raw('affiliations.name, count(user_affiliation.user_id) as user_count'))
                        ->leftJoin('user_affiliation', 'affiliations.id', '=', 'user_affiliation.affiliation_id')
                        ->where('affiliations.province_code', 'like', '13%')
                        ->groupBy(['affiliations.name'])
                        ->orderBy('affiliations.name')
                        ->get();

            } else {
                $affiliationCounts = DB::table('affiliations')
                        ->select(DB::raw('affiliations.name, count(user_affiliation.user_id) as user_count'))
                        ->leftJoin('user_affiliation', 'affiliations.id', '=', 'user_affiliation.affiliation_id')
                        ->where('affiliations.province_code', $params['province_code'])
                        ->groupBy(['affiliations.name'])
                        ->orderBy('affiliations.name')
                        ->get();
            }
            
        } else if (isset($params['region_code'])) {
            $affiliationCounts = DB::table('affiliations')
                        ->select(DB::raw('affiliations.name, count(user_affiliation.user_id) as user_count'))
                        ->leftJoin('user_affiliation', 'affiliations.id', '=', 'user_affiliation.affiliation_id')
                        ->where('affiliations.region_code', $params['region_code'])
                        ->groupBy(['affiliations.name'])
                        ->orderBy('affiliations.name')
                        ->get();
        } 
       
        return $affiliationCounts;
    }

    public function getGlobalSubRegions()
    {
        return DB::table('countries')
                    ->select('subregion')
                    ->distinct()
                    ->orderBy('subregion')
                    ->get();
    }

    public function needsCount($params=null)
    {
        if (isset($params['barangay'])) {
            return DB::table('users')
                    ->select(DB::raw('count(*) as needcount, needs'))
                    ->where('needs', '!=', null)
                    ->where('region_code', $params['region_code'])
                    ->where('barangay', $params['barangay'])
                    ->groupBy('needs')
                    ->orderByDesc('needcount')
                    ->get();
        } else if (isset($params['city_code'])) {
            return DB::table('users')
                    ->select(DB::raw('count(*) as needcount, needs'))
                    ->where('needs', '!=', null)
                    ->where('region_code', $params['region_code'])
                    ->where('city_code', $params['city_code'])
                    ->groupBy('needs')
                    ->orderByDesc('needcount')
                    ->get();
        } else if (isset($params['province_code'])) {

            if($params['province_code'] == '1300') {

                return DB::table('users')
                    ->select(DB::raw('count(*) as needcount, needs'))
                    ->where('needs', '!=', null)
                    ->where('region_code', $params['region_code'])
                    ->where('province_code', 'like', '13%')
                    ->groupBy('needs')
                    ->orderByDesc('needcount')
                    ->get();

            } else {

                return DB::table('users')
                    ->select(DB::raw('count(*) as needcount, needs'))
                    ->where('needs', '!=', null)
                    ->where('region_code', $params['region_code'])
                    ->where('province_code', $params['province_code'])
                    ->groupBy('needs')
                    ->orderByDesc('needcount')
                    ->get();
            }
            
        } else if (isset($params['region_code'])) {
            return DB::table('users')
                ->select(DB::raw('count(*) as needcount, needs'))
                ->where('needs', '!=', null)
                ->where('region_code', $params['region_code'])
                ->groupBy('needs')
                ->orderByDesc('needcount')
                ->get();
        } 

        return DB::table('users')
                ->select(DB::raw('count(*) as needcount, needs'))
                ->where('needs', '!=', null)
                ->groupBy('needs')
                ->orderByDesc('needcount')
                ->get();
    }
}