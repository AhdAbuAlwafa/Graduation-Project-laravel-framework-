<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        // for testing, load actual crafts from db
        return view('home')->with('crafts', ['asdf', 'adfdsfcs', 'zxczxc','jbvlwjwbljkv']);
    }
}
