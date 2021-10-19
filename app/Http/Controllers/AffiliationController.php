<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Affiliation;
use App\Models\Regions;

class AffiliationController extends Controller
{
    public function index()
    {
        $affiliations = auth()->user()->affiliations();
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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            
        ]);

        $user = auth()->user();
        $affiliation = Affiliation::create([
            'organisation_type' => $validatedData['organisation_type'],
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'position' => $validatedData['position'],
            'address' => $validatedData['address'],
            'users_id' => $user->id
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
