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
        $user->update($request->validated());
        $request->session()->flash('message', 'Successfully updated user');
        return redirect()->route('profile.index');
    }

    public function edit()
    {
        return view('dashboard.profile.edit', [
            'user'=> auth()->user(),
            'regions' => Regions::all()
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
