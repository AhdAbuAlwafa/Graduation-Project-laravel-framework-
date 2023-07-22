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
    
        $selectedCraft = $request->input('craft_name') ?? 'all';
        $selectedCity = $request->input('city_name') ?? 'all';
        $selectedVillage = $request->input('village_name') ?? 'all';
        $selectedType = $request->input('advertisement_type') ?? 'all';
    
        $query = Advertisement::query();
    
        // Apply filters based on craft, city, village, and type
        if ($selectedCraft !== 'all') {
            $query->where('job_name', $selectedCraft);
        }
    
        if ($selectedCity !== 'all') {
            $query->whereHas('addresses', function ($query) use ($selectedCity) {
                $query->where('city_name', $selectedCity);
            });
        }
    
        if ($selectedVillage !== 'all') {
            $query->whereHas('addresses', function ($query) use ($selectedVillage) {
                $query->where('village_name', $selectedVillage);
            });
        }
    
        if ($selectedType !== 'all') {
            $query->where('advertisement_type', $selectedType);
        }
    
        // If the user is a worker, apply additional filtering
        if ($isWorker) {
            if ($selectedType === 'workAlone') {
                $query->where('advertisement_type', 'workAlone');
            } elseif ($selectedType === 'workshops') {
                $query->where('advertisement_type', 'workshops');
            }
        }
    
        // Retrieve all advertisements if no filters are selected
        if ($selectedCraft === 'all' && $selectedCity === 'all' && $selectedVillage === 'all' && $selectedType === 'all') {
            // No filters selected, retrieve all advertisements
        }
    
        $advertisements = $query->orderBy('created_at', 'desc')->paginate(12);
        $advertisements->appends($request->query());

        return view('advertisement', compact('user', 'advertisements', 'crafts', 'cities', 'villages', 'selectedCraft', 'selectedCity', 'selectedVillage', 'selectedType'));
    }
    
}
