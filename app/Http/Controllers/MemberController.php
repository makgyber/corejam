<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Regions;
use App\Models\Affiliation;
use App\Models\UserAffiliation;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMemberRequest;


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
        $affiliations = $user->affiliations()->get();

        if($request->has('affiliation_id')) {
            $affiliation_id = $request['affiliation_id'];
        } else {
            $affiliation_id = empty($affiliations->first()) ? '' : $affiliations->first()->id;
        }
            
        if($affiliation_id != '') {
            $members = Affiliation::find($affiliation_id)->users;
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
        $user = auth()->user();
        $affiliation = Affiliation::find($request['affiliation_id']);
        return view('dashboard.members.create', [
            'affiliation' => $affiliation,
            'user' => $user,
            'regions' => Regions::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMemberRequest $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'affiliation_id' => 'required',
        ]);

        $validatedUser = $request->validated();

        $member = User::create($request->validated() + [
            'name' =>  $request['first_name'] . ' ' . $request['last_name'],
            'password' => 'sikreto'
        ]);

        UserAffiliation::create([
            'user_id' => $member->id,
            'affiliation_id'=> $request['affiliation_id'],
            'position'=> $request['position_other'],
            'is_primary' => 0
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
    public function show(User $member)
    {
        dd($member);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(User $member, Request  $request)
    {
        return view('dashboard.members.edit', [
            'affiliation'=>$member->affiliations->find($request['affiliation_id']),
            'member' => $member,
            'regions' => Regions::all()
        ]);
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
