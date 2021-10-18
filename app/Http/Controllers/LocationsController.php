<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinces;
use App\Models\Cities;

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
}
