<?php
namespace App\Services;

use App\Http\Requests\CreateMemberRequest;
use App\Models\User;
use App\Models\UserAffiliation;

class MemberService
{
    public function store(CreateMemberRequest $request)
    {
 
        $checkUserExists = User::where('first_name', $request['first_name'])
                ->where('last_name', $request['last_name'])
                ->where('middle_name', $request['middle_name'])
                ->first();
        if($checkUserExists) {
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

        $validatedData = $request->safe()->except(['position_other', 'skillsets', 'other_skillsets']);

        $member = User::create(
            $validatedData + [
            'name' =>  $request['first_name'] . ' ' . $request['middle_name'] . ' ' . $request['last_name'],
            'password' => 'sikreto',
            'skillsets' => $skillsets,
            'position' => $request['position_other'],
            'menuroles' => 'user',
            'created_by' => (auth()->check()) ? auth()->user()->id : 17
        ]);

        UserAffiliation::create([
            'user_id' => $member->id,
            'affiliation_id'=> $request['affiliation_id'],
            'position'=> $request['position_other'],
            'is_primary' => 0
        ]);
    }
}