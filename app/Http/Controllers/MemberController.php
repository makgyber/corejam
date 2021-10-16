<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Affiliation;
use Illuminate\Http\Request;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $members = [];
        $user = auth()->user();
        $affiliations = Affiliation::where('users_id', $user->id)->get();

        if($request->has('affiliation_id')) {
            $affiliation_id = $request['affiliation_id'];
        } else {
            $affiliation_id = empty($affiliations->first()) ? '' : $affiliations->first()->id;
        }

        if($affiliation_id) {
            $members = Member::where('affiliation_id', $affiliation_id)->paginate(20);
        }
            

        return view('dashboard.members.index', [
            'affiliations' => $affiliations,
            'user' => $user,
            'members' => $members,
            'affiliation_id' => $affiliation_id
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $affiliation = Affiliation::find($request['affiliation_id']);
        return view('dashboard.members.create', [
            'affiliation' => $affiliation,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'affiliation_id' => 'required',
        ]);

        $member = Member::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'affiliation_id' => $validatedData['affiliation_id'],
            'encoded_by' => auth()->user()->id,
            'skillsets' => $request['skillsets'] ?? '',
            'email' => $request['email']  ?? '',
            'contact_number' => $request['contact_number'] ?? '',
        ]);

        $request->session()->flash('message', 'Successfully created member');
        return redirect()->route('members.create', ['affiliation_id' => $validatedData['affiliation_id']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        dd($member);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
