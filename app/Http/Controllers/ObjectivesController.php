<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Target;

class ObjectivesController extends Controller
{
    public function index()
    {
        $targets = Target::paginate(10);
        return view('dashboard.admin.objectives.index', [ 'targets' => $targets]);
    }
}
