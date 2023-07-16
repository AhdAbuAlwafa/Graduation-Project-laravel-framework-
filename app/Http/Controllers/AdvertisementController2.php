<?php

namespace App\Http\Controllers;
use App\Models\Craft;

use Illuminate\Http\Request;

class AdvertisementController2 extends Controller
{
    public function show()
    {
        return view('advertisement');
    }
}
