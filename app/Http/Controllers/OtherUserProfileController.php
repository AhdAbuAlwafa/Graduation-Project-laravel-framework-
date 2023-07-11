<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Address;
use App\Models\Advertisement;

use App\Models\Craft;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;
class OtherUserProfileController extends Controller
{
    
    /**
     * Display the specified resource.
     *  $addresses=Address::get();
     */
    
    public function show()
    {
        return view('userPage.otherUserProfile');
    }
}
