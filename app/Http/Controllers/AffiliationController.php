<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Affiliation;
use App\Models\UserAffiliation;
use App\Models\Regions;
use App\Http\Requests\StoreAffiliationRequest;

class AffiliationController extends Controller
{
    public function index()
    {
        $affiliations = auth()->user()->affiliations()->with('region')->get();

        return view('dashboard.affiliations.index', [
            'affiliations' => $affiliations,
            'regions' => Regions::all(),
            'user' => auth()->user()
        ]);
    }

    public function create()
    {
        $affiliations = auth()->user()->affiliations();
        return view('dashboard.affiliations.create',[
            'affiliations' => $affiliations,
            'regions' => Regions::all(),
            'user' => auth()->user()
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
        ]);

        UserAffiliation::create([
            'user_id' => $user->id,
            'affiliation_id' => $affiliation->id,
            'position' => $validatedData['position'],
            'is_primary' => empty($validatedData['is_primary']),
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

    public function update($affiliation)
    {
            
    }

}
