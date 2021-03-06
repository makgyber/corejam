<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Regions;
use App\Models\Affiliation;
use App\Models\UserAffiliation;
use Illuminate\Http\Request;
use App\Http\Requests\CreateMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Imports\MemberImport;
use App\Models\Country;
use App\Services\MemberService;
use Maatwebsite\Excel\Facades\Excel;
use App\Traits\HasMemberOptions;


class MemberController extends Controller
{

    use HasMemberOptions;
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $members = [];
        $user = auth()->user();

        $affiliations = $user->affiliations;
        $searchfilter = '';


        if($request->has('affiliation_id')) {
            $affiliation_id = $request['affiliation_id'];
        } else {
            $affiliation_id = empty($affiliations->first()) ? '' : $affiliations->first()->id;
        }
            
        $searchfilter = $request['searchfilter'];
        $key = '%' . $searchfilter. '%';
        
        $membersQuery = User::where('created_by', $user->id);

        if($searchfilter != '') {
            $membersQuery->where('name', 'like', $key);
        }

        $membersQuery->whereHas('affiliations', function($q) use ($affiliation_id){
            $q->where('affiliation_id', '=', $affiliation_id);
        });

        return view('dashboard.members.index', [
            'affiliations' => $affiliations,
            'user' => $user,
            'members' => $membersQuery->paginate(20),
            'affiliation_id' => $affiliation_id,
            'searchfilter' => $searchfilter
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(!$request['affiliation_id']) {
            request()->session()->flash('message', 'Missing affiliation. Do you need to add it firsf?');
            return back();
        }

        $user = auth()->user();
        $affiliation = Affiliation::find($request['affiliation_id']);
        return view('dashboard.members.create', [
            'affiliation' => $affiliation,
            'user' => $user,
            'regions' => Regions::all(),
            'skillOptions' => $this->skillOptions,
            'positionOptions' => $this->positionOptions,
            'countries' => Country::all(),
            'needsOptions' => $this->needsOptions
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
        $memberService = new MemberService();
        $memberService->store($request);

        $request->session()->flash('message', 'Successfully created member'); 
        return redirect()->route('members.create', ['affiliation_id' => $request['affiliation_id']]);
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
            'positionOptions' => $this->positionOptions,
            'countries' => Country::all(),
            'needsOptions' => $this->needsOptions
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
            $name =  $request['first_name'] . ' '.  $request['middle_name'] . ' '. $request['last_name'];
            return back()->withErrors(['error'=>'A user with the name ' . $name . ' already exists in the database.']);
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
        $affiliation_id=$member->affiliations->first()->id;

        if(auth()->user()->id == $member->created_by) {
            $result = User::destroy($member->id);
            if($result) {
                request()->session()->flash('message', 'Successfully deleted user');
            } else {
                request()->session()->flash('error', 'Failed to delete user');
            }
            
        }
        
        return redirect()->route('members.index', 'affiliation_id='.$affiliation_id);
    }

    public function import() 
    {

        if(!request()->file('membersheet')) {
            request()->session()->flash('message', 'Please select a file to import first');
            return redirect()->route('members.index', 'affiliation_id='.request()->get('affiliation_id'));
        }

        Excel::import(new MemberImport, request()->file('membersheet'));
        request()->session()->flash('message', 'Successfully imported members');
        return redirect()->route('members.index', 'affiliation_id='.request()->get('affiliation_id'));
    }


    public function selfRegister(Request $request)
    {
        if(!$request['p']) {
            abort(404);
        }

        $params = decrypt($request['p']);
        $coordinator = User::findOrFail($params['c']);
        $affiliation = Affiliation::findOrFail($params['a']);

        return view('auth.register', [
            'affiliation' => $affiliation,  
            'user' => $coordinator,
            'regions' => Regions::all(),
            'skillOptions' => $this->skillOptions,
            'positionOptions' => $this->positionOptions,
            'countries' => Country::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function selfStore(CreateMemberRequest $request)
    {
        $memberService = new MemberService();
        $memberService->store($request);

        return view('auth.self-saved');
    }

    public function qrCode(Request $request)
    {
        return view('auth.qrcode', ['encoded' => $request['p']]);
    }
}
