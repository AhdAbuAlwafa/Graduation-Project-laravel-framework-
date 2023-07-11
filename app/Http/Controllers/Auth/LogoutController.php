<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Craft;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    
    public function destroy(){
        $cities = Address::pluck('city_name','city_name')->all();
        $address=Address::get();
        $crafts=Craft::get();
       Auth::logout();
       //auth()->logout();

        
        return redirect('auth.login', compact('address', 'crafts','cities'));
    }
}
