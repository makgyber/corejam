<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePasswordRequest;
use App\Models\User;

class SetPasswordController extends Controller
{
    public function create()
    {
        return view('dashboard.admin.setpassword');
    }

    public function store(StorePasswordRequest $request)
    {
        auth()->user()->update([
            'password' => bcrypt($request->password)
        ]);
        return redirect()->route('faq', 'start');
    }

    public function invitation(User $user)
    {
        if(!request()->hasValidSignature() || $user->password != 'secret') {
            abort(401);
        }

        auth()->login($user);
        return redirect()->route('setpassword');
    } 
}
