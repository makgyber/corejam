<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return redirect('/blog');    
    }

    public function page($page)
    {
        
        return view('pages.article');
    }

}
