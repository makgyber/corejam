<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Affiliation;

class AffiliationController extends Controller
{
    public function index()
    {
        $affiliations = Affiliation::where('users_id', auth()->user()->id)->paginate(20);
        return view('dashboard.affiliations.index', ['affiliations' => $affiliations]);
    }

    public function create()
    {
        return view('dashboard.affiliations.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'organisation_type' => 'required',
            'name' => 'required',
            'description' => 'required',
            'position' => 'required',
            'address' => 'required',
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
