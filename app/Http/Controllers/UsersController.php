<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\CoordinatorInviteNotification;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\StoreCoordinatorRequest;
use App\Models\Regions;
use Illuminate\Support\Facades\URL;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{

    var $positionOptions = ['Bishop', 'Pastor', 'Elder', 'Board Member/Director', 'Member', 'Other'];
    var $skillOptions = [
        'Preaching', 'Teaching', 'Evangelism', 'Discipleship', 'Leadership', 'Administration', 'Finance'
    ];

    use RegistersUsers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('searchfilter')) {
            $key = '%'.$request['searchfilter'].'%';
            $users = User::where('name', 'like', $key)->paginate(20);
        } else {
            $users = User::paginate(20);
        }
        
        return view('dashboard.admin.usersList', [
            'you' => auth()->user(),
            'users' => $users
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard.admin.userShow', [
            'user' => User::findOrFail($id),
            'skillOptions' => $this->skillOptions
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $skillsets = explode(',', $user->skillsets);
        $other_skillsets = implode(',', array_diff($skillsets, $this->skillOptions));
        $positionOther='';
        $showOther = false;

        $affiliation =$user->affiliations->first();
        if($affiliation) {
            $positionOther = $affiliation->pivot->position;
            $showOther = !in_array($positionOther, $this->positionOptions);
        }
        
        return view('dashboard.admin.userEditForm', [
            'user' => $user,
            'regions' => Regions::all(),
            'skillsets' => $skillsets,
            'other_skillsets' => $other_skillsets,
            'skillOptions' => $this->skillOptions,
            'positionOptions' => $this->positionOptions,
            'position_other' => $positionOther,
            'showOther'=>$showOther,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'       => 'required|min:1|max:256',
            'email'      => 'required|email|max:256'
        ]);
        $user = User::find($id);
        $user->name       = $request->input('name');
        $user->email      = $request->input('email');
        $user->save();
        $request->session()->flash('message', 'Successfully updated user');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user){
            $user->delete();
        }
        return redirect()->route('users.index');
    }

    public function create() 
    {
        return view('dashboard.admin.userCreate');
    }

    public function store(StoreCoordinatorRequest $request)
    {

        $validated = $request->validated();

        $user =  User::create([
            'name' => $validated['first_name'].' '.$validated['last_name'],
            'last_name' => $validated['last_name'],
            'first_name' => $validated['first_name'],
            'email' => $validated['email'],
            'password' => 'secret'
        ]);

        if(isset($validated['as_admin']) && $validated['as_admin'] == 'true') {
            $user->assignRole('admin');
            $user->menuroles='coordinator,admin';
            $user->save();
        }
        $user->assignRole('coordinator');

        $url = URL::signedRoute('invitation', $user);
        
        $user->notify(new CoordinatorInviteNotification($url));
        return redirect()->route('coordinators.create')->with('message', 'Successfully created coordinator');
        
    }

    public function import() 
    {

        Excel::import(new UsersImport, request()->file('membersheet'));
        
        return redirect()->route('coordinators.index')->with('success', 'All good!');
    }
 
}
