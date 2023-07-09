<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Craft;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    
    public function logout(){
        $cities = Address::pluck('city_name','city_name')->all();
        $address=Address::get();
        $crafts=Craft::get();
        return view('auth.login', compact('address', 'crafts','cities'));
    }
}
