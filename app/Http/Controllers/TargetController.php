<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Target;
use App\Http\Requests\TargetRequest;

class TargetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user(); 
        $targets = Target::where('owner', $user->id)->paginate(20);
        return view('dashboard.targets.index', [
             'targets' => $targets
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.targets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TargetRequest $request)
    {
        $target = Target::create(
            [
                'owner' => auth()->user()->id
            ] + $request->validated()
        );
        $request->session()->flash('message', 'Successfully created target objective');

        return redirect()->route('targets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Target $target)
    {
        if($target->user->id !== auth()->user()->id) {
            return abort(403);
        }
        return view('dashboard.targets.edit', ['target'=>$target]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TargetRequest $request, $id)
    {
        $target = Target::findOrFail($id);
        if($target->user->id !== auth()->user()->id) {
            return abort(403);
        }
        $target->update($request->validated());
        $request->session()->flash('message', 'Successfully updated target objective');

        return redirect()->route('targets.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $target = Target::findOrFail($id);
        if($target->user->id !== auth()->user()->id) {
            return abort(403);
        }
        $target->destroy($id);
        return redirect()->route('targets.index');
    }
}
