<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use Illuminate\Http\Request;
use App\Models\Provinces;
use App\Models\Cities;
use App\Models\Country;
use App\Models\State;
use App\Models\WorldCity;

class LocationsController extends Controller
{
    public function provinces(Request $request)
    {
        $provinces = Provinces::where('region_code', $request['region'])->get();
        return $provinces;
    }

    public function cities(Request $request)
    {

        if($request['province'] == '1300') {
            $cities = Cities::where('province_code', 'like', '13%')->get();
        } else {
            $cities = Cities::where('province_code', $request['province'])->get();
        }

        
        return $cities;
    }

    public function barangays(Request $request)
    {
        $barangays = Barangay::where('city_code', $request['city'])->get();
        if(substr($request['city'],0,4) == '1339') {
            $barangays = Barangay::where('city_code', 'like', '1339%')->get();
        } 
        return $barangays;
    }

    public function countries(Request $request)
    {
        $countries = Country::where('name', $request['country'])->get();
        return $countries;
    }

    public function states(Request $request)
    {
        $states = State::where('country_id', $request['country'])->orderBy('name', 'asc')->get();
        return $states;
    }

    public function worldCities(Request $request)
    {
        $worldCities = WorldCity::where('country_id', $request['country']);
        if($request['state']!='') {
            $worldCities->where('state_id', $request['state']);
        }
        return $worldCities->get();
    }

    public function countriesBySubregion(Request $request)
    {
        $countries = Country::where('subregion', $request['subregion'])
                    ->where('id', '!=', 174)
                    ->get();
        return $countries;
    }
}
