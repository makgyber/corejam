<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Target;
use App\Http\Requests\CreateActivityRequest;
use Illuminate\Http\Request;

class ActivityController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Target $target)
    {
        if($target->user->id !== auth()->user()->id){
            return abort(403);
        }

        return view('dashboard.activities.index', [
            'target'=>$target
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Target $target)
    {
 
        return view('dashboard.activities.create', [
            'target' => $target
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateActivityRequest $request)
    {

        Activity::create($request->validated());
        $request->session()->flash('message', 'Successfully added activity');

        return redirect()->route('activities.index', $request['target_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */

    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Target $target, Activity $activity)
    {
        if($activity->owner !== auth()->user()->id) {
            return abort(403);
        }
        return view('dashboard.activities.edit', ['target'=>$target, 'activity'=>$activity]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(CreateActivityRequest $request, $targetId, $activityId)
    {
        
        $activity= Activity::findOrFail($activityId);
        
        if($activity->owner !== auth()->user()->id) {
            return abort(403);
        }
        $activity->update($request->validated());
        $request->session()->flash('message', 'Successfully updated target objective');

        return redirect()->route('activities.index',[$activity->target_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Target $target, Activity $activity)
    {
        if($activity->user->id !== auth()->user()->id){
            return abort(403);
        }

        $activity->destroy($activity->id);
        return redirect()->route('activities.index', [$activity->target_id, $activity->id]);
    }
}
