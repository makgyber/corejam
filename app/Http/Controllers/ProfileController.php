<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index(User $user) 
    {
        return view('dashboard.profile.index', compact('user', auth()->user()));
    }

    public function details(Request $request)
    {
        //TODO
    }

    public function changePassword(Request $request)
    {
        //TODO
    }
}
