<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Regions;
use App\Http\Requests\ProfileDetailRequest;
use App\Http\Requests\ChangePasswordRequest;

class ProfileController extends Controller
{
    public function index(User $user) 
    {
        return view('dashboard.profile.index', [
            'user'=> auth()->user(),
            'regions' => Regions::all()
        ]);
    }

    public function store(ProfileDetailRequest $request)
    {
        $user = auth()->user();
        $checkUser = User::where('first_name', $request['first_name'])
                            ->where('last_name', $request['last_name'])
                            ->where('middle_name', $request['middle_name'])
                            ->where('id', '!=', $user->id)
                            ->first();
        if($checkUser) {
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

   
        $user->update($validated + [
            'skillsets' =>  $skillsets
        ]);

        $request->session()->flash('message', 'Successfully updated user');
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
            'user'=> $user,
            'regions' => Regions::all(),
            'skillsets' => $skillsets,
            'other_skillsets' => $other_skillsets,
            'skillOptions' => $skillOptions
        ]);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        auth()->user()->update([
            'password' => bcrypt($request->password)
        ]);
        $request->session()->flash('message', 'Successfully updated user');
        return redirect()->route('profile.index');
    }
}
