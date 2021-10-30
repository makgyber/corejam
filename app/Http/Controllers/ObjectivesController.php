<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Target;
use App\Models\Activity;
use App\Models\Regions;
use App\Http\Requests\AdminUpdateActivityRequest;

class ObjectivesController extends Controller
{
    public function index(Request $request)
    {
        $regions = Regions::all();
        if($request->has('region_code')) {
            $regionCode = $request['region_code'];
        } else {
            $regionCode = $regions->first()->code;
        }
        
        $targets = Target::with('activities')->whereRelation('user', 'region_code','=', $regionCode )->paginate(5);

        return view('dashboard.admin.objectives.index', [ 
            'targets' => $targets, 
            'regions' => $regions,
            'regionCode' => $regionCode
        ]);
    }

    public function edit( $id)
    {
        $activity = Activity::findOrFail($id);
        return view('dashboard.admin.objectives.edit', ['activity' => $activity]);
    }

    public function update(AdminUpdateActivityRequest $request, $id)
    {
        $activity = Activity::findOrFail($id);
        $activity->update($request->validated());
        return redirect()->route('objectives.index');
    }
}
