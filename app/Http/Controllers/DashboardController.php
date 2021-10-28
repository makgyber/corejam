<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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

        $totals = [
            'organizations' => Affiliation::count(), 
            'government' => mt_rand(1, 19999), 
            'targetRegistrations' => Configuration::select('value')->where('key', 'target.registrations')->first()->value, 
            'coordinators' => User::where('menuroles', 'coordinator')->count(), 
            'registered_voters' => User::where('is_registered_voter', 1)->count(),
            'total_users' => User::count(),
        ];


        'SELECT  b.name, count(a.id)  FROM regions b left join users a on b.code = a.region_code
        group by b.code';

        $regionCounts = DB::table('regions')
                        ->select(DB::raw('regions.name, count(users.id) as user_count'))
                        ->leftJoin('users', 'regions.code', '=', 'users.region_code')
                        ->groupBy('regions.name')
                        ->orderBy('regions.code')
                        ->get();

        return view('dashboard.homepage', [
            'totals' => $totals,
            'regionCounts' => $regionCounts,
            'coordinators' => User::where('menuroles', 'coordinator')->with('region')->paginate(20)
        ]);
    }
}
