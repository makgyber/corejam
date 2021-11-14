<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function show($slug) 
    {
        $page = $slug ?? 'index';
        return view('dashboard.faq.' . $page);
    }
}
