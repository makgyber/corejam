<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Regions;
use App\Models\Affiliation;
use App\Models\UserAffiliation;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMemberRequest;

use App\Http\Requests\UpdateMemberRequest;


class MemberController extends Controller
{
    var $positionOptions = ['Bishop', 'Pastor', 'Elder', 'Board Member/Director', 'Member', 'Other'];
    var $skillOptions = [
        'Preaching', 'Teaching', 'Evangelism', 'Discipleship', 'Leadership', 'Administration', 'Finance'
    ];
     
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
            'regions' => Regions::all(),
            'skillOptions' => $this->skillOptions,
            'positionOptions' => $this->positionOptions
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
        $checkUserExists = User::where('first_name', $request['first_name'])
                            ->where('last_name', $request['last_name'])
                            ->where('middle_name', $request['middle_name'])
                            ->first();
        if($checkUserExists) {
            return back()->withError('A user with the same name already exists in the database.')
                        ->withInput();
        }
        
        $validated = $request->safe()->except(['skillsets', 'other_skillsets']);

        $skillsets = '';
        if(!empty($request['skillsets'])) {
            if(is_array($request['skillsets'])) {
                $skillsets = implode( ',', $request['skillsets'] );
            } else {
                $skillsets = $request['skillsets'];
            }
        }


        if(!empty($request['other_skillsets'])) {
            $skillsets .= ',' . $request['other_skillsets'];
        }

        $validatedData = $request->safe()->except(['position_other', 'skillsets', 'other_skillsets']);

        $member = User::create(
            $validatedData + [
            'name' =>  $request['first_name'] . ' ' . $request['middle_name'] . ' ' . $request['last_name'],
            'password' => 'sikreto',
            'skillsets' => $skillsets,
            'position' => $request['position_other']
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
        
        $skillsets = explode(',', $member->skillsets);
        $other_skillsets = implode(',', array_diff($skillsets, $this->skillOptions));

        

        $affiliation =$member->affiliations->find($request['affiliation_id']);
        $position = $affiliation->pivot->position;
        $showOther = !in_array($position, $this->positionOptions);
        return view('dashboard.members.edit', [
            'affiliation'=> $affiliation,
            'member' => $member,
            'regions' => Regions::all(),
            'skillsets' => $skillsets,
            'other_skillsets' => $other_skillsets,
            'skillOptions' => $this->skillOptions,
            'position_other' => $affiliation->pivot->position,
            'showOther'=>$showOther,
            'positionOptions' => $this->positionOptions
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemberRequest $request, User $member)
    {
        $checkUserExists = User::where('first_name', $request['first_name'])
                            ->where('last_name', $request['last_name'])
                            ->where('middle_name', $request['middle_name'])
                            ->where('id','!=', $member->id)
                            ->first();
        if($checkUserExists) {
            return back()->withError('A user with the same name already exists in the database.')
                        ->withInput();
        }
        
        $validated = $request->safe()->except(['skillsets', 'other_skillsets','position_other', 'position']);

        $skillsets = '';
        if(!empty($request['skillsets'])) {
            if(is_array($request['skillsets'])) {
                $skillsets = implode( ',', $request['skillsets'] );
            } else {
                $skillsets = $request['skillsets'];
            }
        }


        if(!empty($request['other_skillsets'])) {
            $skillsets .= ',' . $request['other_skillsets'];
        }
   
        $member->update($validated + [
            'skillsets' =>  $skillsets
        ]);

        $member->affiliations()->update([
            'position' => $request['position_other']
        ]);

        $request->session()->flash('message', 'Successfully updated user');
        return redirect()->route('members.index', 'affiliation_id='.$request['affiliation_id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $member)
    {
        //
    }
}
