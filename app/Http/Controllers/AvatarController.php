<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'avatar' => 'required',
        ]);
        
        $path = $request->file('avatar')->store('avatars');

        try {
            $user = auth()->user();
            $user->image = $path;
            $user->save();
        } catch(\Exception $ex) {
            request()->session()->flash('errors', 'Failed to update avatar');
            return back();
        }
        
        request()->session()->flash('message', 'Avatar updated');
        return redirect()->route('profile.index');
    }
}
