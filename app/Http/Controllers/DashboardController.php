<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Activity;
use App\Models\Affiliation;
use App\Models\Configuration;
use App\Models\Country;
use App\Models\Regions;
use App\Services\AnalyticsService;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    var $analytics;

    public function __construct(AnalyticsService  $analyticsService)
    {
        $this->middleware('auth');
        $this->analytics = $analyticsService;
    }

    public function index()
    {
        return view('dashboard.homepage', [
            'drillTo' => '',
            'totals' => $this->analytics->getTotals(null),
            'regionCounts' => $this->analytics->getRegionCounts(),
            'globalRegionCounts' => $this->analytics->getGlobalRegionCounts(),
            'coordinators' => $this->analytics->getCoordinatorActivities(),
            'regionTargets'=> $this->analytics->getRegionTargets(),
        ]);
    }

    /**
     * $category -> region, province, city, barangay
     */
    public function stats(Request $request)
    {
        $params = $request->all();
        return view('dashboard.stats', [
            'params' => $params,
            'regions' => Regions::all(),
            'totals' => $this->analytics->getTotals($params),
            'locationCounts' => $this->analytics->getLocationCounts($params),
            'affiliationCounts' => $this->analytics->getAffiliationCounts($params)
        ]);
    }

    /**
     * $category -> country, state, city, 
     */
    public function globalstats(Request $request)
    {
        $params = $request->all();
        return view('dashboard.globalstats', [
            'params' => $params,
            'subregions' => $this->analytics->getGlobalSubRegions(),
            'totals' => $this->analytics->getGlobalTotals($params),
            'locationCounts' => $this->analytics->getGlobalLocationCounts($params),
            'affiliationCounts' => $this->analytics->getGlobalAffiliationCounts($params)
        ]);
    }

}
