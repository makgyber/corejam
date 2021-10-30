<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Target;
use App\Models\Activity;
use App\Http\Requests\AdminUpdateActivityRequest;

class ObjectivesController extends Controller
{
    public function index()
    {
        $targets = Target::paginate(10);
        return view('dashboard.admin.objectives.index', [ 'targets' => $targets]);
    }

    public function edit( $id)
    {
        $activity = Activity::findOrFail($id);
        return view('dashboard.admin.objectives.edit', ['activity' => $activity]);
    }

    public function update(AdminUpdateActivityRequest $request, $id)
    {
        $activity = Activity::findOrFail($id);
        $activity->update($request->validated());
        return redirect()->route('objectives.index');
    }
}
