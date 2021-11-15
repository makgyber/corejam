<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Activity;
use App\Models\Affiliation;
use App\Models\Configuration;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        if(!auth()->check()) {
            return view('auth.login');
        }

        $demoSql = 'count( *) as totalUsers,  
        sum(if(timestampdiff( YEAR, birthday, now() ) <= 29, 1, 0)) as youth, 
        sum(if(timestampdiff( YEAR, birthday, now() ) > 29 && timestampdiff( YEAR, birthday, now() ) < 60, 1, 0)) as adults, 
        sum(if(timestampdiff( YEAR, birthday, now() ) >59, 1, 0)) as seniors
        ';

        $demographics = DB::table('users')
                            ->select(DB::raw($demoSql))
                            ->first();

        $genderSql = 'count( *) as totalUsers,  
        sum(if(gender = "M", 1, 0)) as male, 
        sum(if(gender = "F", 1, 0)) as female
        ';                   
        $gender =  DB::table('users')
                    ->select(DB::raw($genderSql))
                    ->first();                   

        $totals = [
            'organizations' => Affiliation::count(), 
            'government' => mt_rand(1, 19999), 
            'targetRegistrations' => Configuration::select('value')->where('key', 'target.registrations')->first()->value, 
            'coordinators' => User::where('menuroles', 'coordinator')->count(), 
            'registered_voters' => User::where('is_registered_voter', 1)->count(),
            'total_users' => User::count(),
            'youth' => $demographics->youth,
            'adults' => $demographics->adults,
            'seniors' => $demographics->seniors,
            'male'=>$gender->male,
            'female'=>$gender->female
        ];

        

        $regionCounts = DB::table('regions')
                        ->select(DB::raw('regions.code, regions.name, count(users.id) as user_count'))
                        ->leftJoin('users', 'regions.code', '=', 'users.region_code')
                        ->groupBy(['regions.code','regions.name'])
                        ->orderBy('regions.code')
                        ->get();

        

        $regionTargets = Configuration::where('key', 'like', 'region.%')->get();

        $regionStats = [];
        foreach($regionTargets as $regionTarget) {
            $regionStats[substr($regionTarget->key,-2)] = $regionTarget->value;
        }

        $coordinators = DB::table('activities')
                        ->select(DB::raw('activities.title, users.name, users.first_name,users.last_name, users.created_at,regions.name as region_name, activities.support_how_much, activities.disbursed, max(activities.updated_at)'))
                        ->leftJoin('users', 'activities.owner', '=', 'users.id')
                        ->leftJoin('regions', 'regions.code', '=', 'users.region_code')
                        ->groupBy(['activities.title','users.name', 'users.first_name','users.last_name','users.created_at','regions.name','activities.support_how_much', 'activities.disbursed',])
                        ->orderBy('activities.updated_at')
                        ->paginate(20);

        return view('dashboard.homepage', [
            'totals' => $totals,
            'regionCounts' => $regionCounts,
            'coordinators' => $coordinators,
            'regionTargets'=> $regionStats
        ]);
    }
}
