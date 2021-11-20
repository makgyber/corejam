<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Activity;
use App\Models\Affiliation;
use App\Models\Configuration;
use App\Services\AnalyticsService;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $analytics = new AnalyticsService();

        if(!auth()->check()) {
            return view('auth.login');
        }

        return view('dashboard.homepage', [
            'drillTo' => '',
            'totals' => $analytics->getTotals(),
            'regionCounts' => $analytics->getRegionCounts(),
            'coordinators' => $analytics->getCoordinatorActivities(),
            'regionTargets'=> $analytics->getRegionTargets()
        ]);
    }

    /**
     * $category -> region, province, city, barangay
     */
    public function stats($category, $code)
    {
        $analytics = new AnalyticsService();

        if(!auth()->check()) {
            return view('auth.login');
        }

        return view('dashboard.stats', [
            'drillTo' => '',
            'totals' => $analytics->getTotals(),
            'regionCounts' => $analytics->getRegionCounts(),
            'coordinators' => $analytics->getCoordinatorActivities(),
            'regionTargets'=> $analytics->getRegionTargets()
        ]);
    }

    public function byProvince()
    {
        
    }

    public function byCity()
    {
        
    }

    public function byBarangay()
    {
        
    }
}
