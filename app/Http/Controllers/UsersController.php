<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileDetailRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\CoordinatorInviteNotification;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\StoreCoordinatorRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\Regions;
use Illuminate\Support\Facades\URL;
use App\Imports\UsersImport;
use App\Models\Target;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{

    var $positionOptions = ['Bishop', 'Pastor', 'Elder', 'Board Member/Director', 'Member', 'Other'];
    var $skillOptions = [
        'Preaching', 'Teaching', 'Evangelism', 'Discipleship', 'Leadership', 'Administration', 'Finance'
    ];
    var $coordinatorLevels = ['regional', 'provincial', 'city', 'municipal'];

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
        $targets = Target::where('owner', $id)->with('activities')->paginate(5);
        return view('dashboard.admin.userShow', [
            'user' => User::findOrFail($id),
            'skillOptions' => $this->skillOptions,
            'targets'=>$targets
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
    public function update(ProfileDetailRequest $request, $id)
    {
        $user = User::find($id);
        $checkUserExists = User::where('first_name', $request['first_name'])
                            ->where('last_name', $request['last_name'])
                            ->where('middle_name', $request['middle_name'])
                            ->where('id', '!=', $user->id)
                            ->first();

        if($checkUserExists) {
            $name =  $request['first_name'] . ' '.  $request['middle_name'] . ' '. $request['last_name'];
            return back()->withErrors(['error'=>'A user with the name ' . $name . ' already exists in the database.']);
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

        $user->update($validated + [
            'skillsets' =>  $skillsets,
            'name' => $request['first_name'] . ' '.  $request['middle_name'] . ' '. $request['last_name']
        ]);

        request()->session()->flash('message', 'Successfully updated user');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(auth()->user()->hasRole('admin') && auth()->user()->id == $id) {
            User::destroy($request['item']);
        }

        return redirect()->route('users.index')->with('message', 'Successfully deleted coordinator');
    }

    public function create() 
    {
        return view('dashboard.admin.userCreate',[
            'regions' => Regions::all(),
            'coordinatorLevels' => $this->coordinatorLevels
        ]);
    }

    public function store(StoreCoordinatorRequest $request)
    {

        $validated = $request->validated();
        $coordinatorScope = '';
        if(isset($validated['coordinator_level']))  {
            if ($validated['coordinator_level'] == 'regional') {
                $coordinatorScope = $validated['region_code'];
            } else if ($validated['coordinator_level'] == 'provincial') {
                $coordinatorScope = $validated['province_code'];
            } else if ($request['coordinator_level'] == 'city') {
                $coordinatorScope = $request['city_code'];
            } else if ($request['coordinator_level'] == 'municipal') {
                $coordinatorScope = $request['city_code'];
            }
        }

        $user =  User::create([
            'name' => $validated['first_name'].' '.$validated['last_name'],
            'last_name' => $validated['last_name'],
            'first_name' => $validated['first_name'],
            'email' => $validated['email'],
            'password' => 'secret',
            'created_by' => auth()->user()->id,
            'coordinator_level' => $validated['coordinator_level'],
            'coordinator_scope' => $coordinatorScope
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
        if(!request()->file('membersheet')) {
            request()->session()->flash('message', 'Please select a file to import first');
            return redirect()->route('coordinators.index')->with('success', 'All good!');
        }
        Excel::import(new UsersImport, request()->file('membersheet'));
        request()->session()->flash('message', 'Successfully imported users');
        return redirect()->route('coordinators.index')->with('success', 'All good!');
    }

    public function showInvite($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.admin.userShowInvite', compact('user'));
    }
 
    public function sendInvite(Request $request)
    {
        $user = User::findOrFail($request['user_id']);
        $user->password = 'secret';
        $user->menuroles = 'coordinator';
        if(isset($request['as_admin']) && $request['as_admin'] == 'true') {
            $user->menuroles .= ',admin';
            $user->assignRole('admin');
        } 
        $user->save();
        $user->assignRole('coordinator');
        $url = URL::signedRoute('invitation', $user);
        $user->notify(new CoordinatorInviteNotification($url));

        $request->session()->flash('message', 'Invitation sent to ' . $user->name);
        return redirect()->route('users.index');
    }

    public function reInvite(Request $request)
    {
        $user = User::findOrFail($request['user_id']);
        $user->password = 'secret';
        $user->save();
        $url = URL::signedRoute('invitation', $user);
        $user->notify(new CoordinatorInviteNotification($url));

        $request->session()->flash('message', 'Invitation sent to ' . $user->name);
        return redirect()->route('users.index');
    }

    public function showRole($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.admin.userShowRole', [
            'user'=>$user,
            'regions'=>Regions::all(),
            'roles'=>Role::all(),
            'coordinatorLevels'=> $this->coordinatorLevels
        ]); 
    }

    public function assignRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->syncRoles($request['roles']);
        // foreach($request['roles'] as $role) {
        //     $user->assignRole($role);
        // }

        if(isset($request['coordinator_level'])){
            if ($request['coordinator_level'] == 'regional') {
                $coordinatorScope = $request['region_code'];
            } else if ($request['coordinator_level'] == 'provincial') {
                $coordinatorScope = $request['province_code'];
            } else if ($request['coordinator_level'] == 'city') {
                $coordinatorScope = $request['city_code'];
            } else if ($request['coordinator_level'] == 'municipal') {
                $coordinatorScope = $request['city_code'];
            }

            $user->menuroles = implode(',', $request['roles']);
            $user->coordinator_level = $request['coordinator_level'];
            $user->coordinator_scope = $coordinatorScope;
            $user->save();
        }

        request()->session()->flash('message', 'Role assignment completed');
        return redirect()->route('coordinators.index');
    }
}
