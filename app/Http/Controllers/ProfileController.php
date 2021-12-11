<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Regions;
use App\Http\Requests\ProfileDetailRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\Country;
use App\Models\Target;
use App\Traits\HasMemberOptions;

class ProfileController extends Controller
{
    use HasMemberOptions;
    
    public function index() 
    {
        $targets = Target::where('owner', auth()->user()->id)->with('activities')->paginate(5);
        return view('dashboard.profile.index', [
            'user'=> auth()->user(),
            'regions' => Regions::all(),
            'targets' => $targets
        ]);
    }

    public function store(ProfileDetailRequest $request)
    {
        $user = auth()->user();
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
            'name' => $name =  $request['first_name'] . ' '.  $request['middle_name'] . ' '. $request['last_name']
        ]);

        request()->session()->flash('message', 'Successfully updated user');
        return redirect()->route('profile.index');
    }

    public function edit()
    {
        $skillOptions = [
            'Preaching', 'Teaching', 'Evangelism', 'Discipleship', 'Leadership', 'Administration', 'Finance'
        ];
        $user = auth()->user();
        $skillsets = explode(',', $user->skillsets);
        $other_skillsets = implode(',', array_diff($skillsets, $skillOptions));

        return view('dashboard.profile.edit', [
            'member'=> $user,
            'regions' => Regions::all(),
            'skillsets' => $skillsets,
            'other_skillsets' => $other_skillsets,
            'skillOptions' => $skillOptions,
            'countries' => Country::all(),
            'needsOptions'=>$this->needsOptions
        ]);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        auth()->user()->update([
            'password' => bcrypt($request->password)
        ]);
        request()->session()->flash('message', 'Successfully updated user');
        return redirect()->route('profile.index');
    }

    public function showChangePassword()
    {
        return view('dashboard.profile.changepassword');
    }

    public function card(Request $request)
    {
        if(!$request['q']) {
            abort(404);
        }

        $params = decrypt($request['q']);
        $user = User::findOrFail($params['s']);

        return view('dashboard.profile.card', ['user' => $user]);
    }

}
