<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        if(!auth()->check()) {
            return view('auth.login');
        }

        $totals = [
            'church' => mt_rand(1, 19999), 
            'government' => mt_rand(1, 19999), 
            'ngo' => mt_rand(1, 19999), 
            'other' => mt_rand(1, 19999),
            'coordinators' => mt_rand(1, 999), 
            'voters' => mt_rand(1, 1999999),
        ];
        return view('dashboard.homepage', [
            'totals' => $totals
        ]);
    }
}
