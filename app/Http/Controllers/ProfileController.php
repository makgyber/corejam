<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Regions;
use App\Requests\ProfileDetailRequest;

class ProfileController extends Controller
{
    public function index(User $user) 
    {

        return view('dashboard.profile.index', [
            'user'=> auth()->user(),
            'regions' => Regions::all()
        ]);
    }

    public function details(ProfileDetailRequest $request)
    {
        //TODO
    }

    public function changePassword(Request $request)
    {
        //TODO
    }
}
