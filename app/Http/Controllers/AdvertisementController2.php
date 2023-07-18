<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Advertisement;
use App\Models\Craft;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertisementController2 extends Controller
{
    public function show(Request $request)
    {
        $user = Auth::user();
        $isWorker = $user->is_worker;

        $crafts = Craft::all();
        $cities = Address::distinct()->pluck('city_name', 'city_name')->toArray();
        $villages = Address::distinct()->pluck('village_name', 'village_name')->toArray();
    
        $selectedCraft = $request->input('craft_name');
        $selectedCity = $request->input('city_name');
        $selectedVillage = $request->input('village_name');
        $selectedType = $request->input('advertisement_type');
    
        $query = Advertisement::query();
    
        if ($selectedCraft && $selectedCraft !== 'all') {
            $query->where('job_name', $selectedCraft);
        }
    
        if ($selectedCity && $selectedCity !== 'all') {
            $query->whereHas('addresses', function ($query) use ($selectedCity) {
                $query->where('city_name', $selectedCity);
            });
        }
    
        if ($selectedVillage && $selectedVillage !== 'all') {
            $query->whereHas('addresses', function ($query) use ($selectedVillage) {
                $query->where('village_name', $selectedVillage);
            });
        }
    
        if ($selectedType && $selectedType !== 'all') {
            $query->where('advertisement_type', $selectedType);
        }
        if ($isWorker == 0) {
           
                $query->where('advertisement_type', 'workAlone');
            
        } elseif ($isWorker == 1) {
            if ($selectedType === 'workshops') {
                $query->where('advertisement_type', 'workshops');
            } else {
                $query->where('advertisement_type', 'workAlone');
            }
        }
    
        $advertisements = $query->orderBy('created_at', 'desc')->paginate(12);
    
        return view('advertisement', compact('user','advertisements', 'crafts', 'cities', 'villages', 'selectedCraft','selectedCity','selectedVillage','selectedType'));
    }
}
