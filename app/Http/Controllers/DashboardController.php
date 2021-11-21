<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Activity;
use App\Models\Affiliation;
use App\Models\Configuration;
use App\Models\Regions;
use App\Services\AnalyticsService;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    var $analytics;

    public function __construct(AnalyticsService  $analyticsService)
    {
        $this->analytics = $analyticsService;
    }

    public function index()
    {
        $analytics = new AnalyticsService();

        if(!auth()->check()) {
            return view('auth.login');
        }

        return view('dashboard.homepage', [
            'drillTo' => '',
            'totals' => $this->analytics->getTotals(),
            'regionCounts' => $this->analytics->getRegionCounts(),
            'coordinators' => $this->analytics->getCoordinatorActivities(),
            'regionTargets'=> $this->analytics->getRegionTargets()
        ]);
    }

    /**
     * $category -> region, province, city, barangay
     */
    public function stats(Request $request)
    {

        if(!auth()->check()) {
            return view('auth.login');
        }

        $params = $request->all();
        return view('dashboard.stats', [
            'params' => $params,
            'regions' => Regions::all(),
            'totals' => $this->analytics->getTotals($params),
            'regionCounts' => $this->analytics->getRegionCounts(),
            'coordinators' => $this->analytics->getCoordinatorActivities(),
            'regionTargets'=> $this->analytics->getRegionTargets()
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
