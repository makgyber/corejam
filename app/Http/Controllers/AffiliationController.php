<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Affiliation;
use App\Models\UserAffiliation;
use App\Models\Regions;
use App\Http\Requests\StoreAffiliationRequest;
use App\Http\Requests\UpdateAffiliationRequest;
use App\Models\Country;

class AffiliationController extends Controller
{
    var $positionOptions = ['Bishop', 'Pastor', 'Elder', 'Board Member/Director', 'Member', 'Other'];
    public function index()
    {
        $affiliations = auth()->user()->affiliations()->get();

        return view('dashboard.affiliations.index', [
            'affiliations' => $affiliations,
            'user' => auth()->user()
        ]);
    }

    public function create()
    {
        $affiliations = auth()->user()->affiliations();
        
        return view('dashboard.affiliations.create',[
            'affiliations' => $affiliations,
            'regions' => Regions::all(),
            'countries' => Country::all(),
            'user' => auth()->user()
        ]);
    }

    public function edit(Affiliation $affiliation)
    {
        $user = auth()->user();
        $pivot = $user->affiliations->find($affiliation->id)->pivot;
        $showOther = !in_array($pivot->position, $this->positionOptions);
        return view('dashboard.affiliations.edit',[
            'affiliation' => $affiliation,
            'regions' => Regions::all(),
            'user' => $user,
            'pivot' => $pivot,
            'position_other' => $pivot->position,
            'showOther'=>$showOther,
            'positionOptions' => $this->positionOptions,
            'countries' => Country::all()
        ]);
    }

    public function store(StoreAffiliationRequest $request)
    {
        $user = auth()->user();
        $validatedData = $request->validated();
        $affiliation = Affiliation::create([
            'organisation_type' => $validatedData['organisation_type'],
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'address' => $validatedData['address'],
            'region_code' => $validatedData['region_code'],
            'province_code' => $validatedData['province_code'],
            'city_code' => $validatedData['city_code'],
            'country_id' => $validatedData['country_id'], 
            'state_id' => $validatedData['state_id'], 
            'world_city_id' => $validatedData['world_city_id'],
        ]);

        UserAffiliation::create([
            'user_id' => $user->id,
            'affiliation_id' => $affiliation->id,
            'position' => $validatedData['position'],
            'is_primary' => $request['is_primary']=='true' ? 1 : 0,
        ]);
        $request->session()->flash('message', 'Successfully created affiliation');

        return redirect()->route('affiliations.index');
    }

    public function show($affiliation)
    {
            
    }

    public function destroy($affiliation)
    {
        $affiliation = Affiliation::find($affiliation);
        if($affiliation){
            $affiliation->delete();
        }
        return redirect()->route('affiliations.index');
    }

    public function update(UpdateAffiliationRequest $request, Affiliation $affiliation)
    {
        $validatedData = $request->safe()->except(['position_other','is_primary']);
        $affiliation->update($validatedData);

        $position = ($request['position']=='Other')?$request['position_other']:$request['position'];
        auth()->user()->affiliations->find($affiliation->id)->pivot->update(
            [
                'position' => $position,
                'is_primary' => $request['is_primary']?1:0
                
            ]
            );
        $request->session()->flash('message', 'Successfully updated affiliation');
        return redirect()->route('affiliations.index');
    }

}
