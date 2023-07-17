<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Craft;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class PublicController extends Controller
{
    public function index()
    {
        return view('who-are-we');

    }
    
    public function getVillages(Request $request)
 {
    $city = $request->input('city_name');
    Log::info("Selected City: " . $city);

    $villages = Address::where('city_name', $city)->get();
    return response()->json($villages);
}


     function showWorker($id){
        $user = User::with('addresses', 'crafts')->where('id', $id)->first();
        return view('userPage.showWorker', compact('user'));


    }
    public function filterNav(Request $request)
    {
        $selectedCraft = $request->input('craft_name', 'all');
        $crafts = Craft::get();
        $cities = Address::distinct()->pluck('city_name', 'city_name')->toArray();
    
        $craft = $request->input('craft_name');
        $city = $request->input('city_name');
        $village = $request->input('village_name');
    
        
        $query = User::where('is_worker', 1)->with('addresses')->with('crafts');
    
        // Apply filters based on craft, city, and village
        if ($village == $city && $city == $craft && $craft == 'all') {
            // No filters selected, retrieve all users
        } 
      
        else if ($craft != 'all') {
            if ($village != 'all') {
                // Filter by craft and village
                $IDs = Address::select('id')->where('village_name', $village)->get();
                $query->whereIn('address_id', $IDs);
                $query->whereHas('crafts', function ($qu) use ($craft) {
                    $qu->where('crafts.id', $craft);
                });
            } else if ($village == 'all') {
                if ($city != 'all') {
                    // Filter by craft and city
                    $IDs = Address::select('id')->where('city_name', $city)->get();
                    $query->whereIn('address_id', $IDs);
                    $query->whereHas('crafts', function ($qu) use ($craft) {
                        $qu->where('crafts.id', $craft);
                    });
                } else {
                    // Filter by craft only
                    $query->whereHas('crafts', function ($qu) use ($craft) {
                        $qu->where('crafts.id', $craft);
                    });
                }
            }
        } else if ($craft == 'all') {
            if ($village != 'all') {
                // Filter by village only
                $IDs = Address::select('id')->where('village_name', $village)->get();
                $query->whereIn('address_id', $IDs);
            } else {
                // Filter by city only
                $IDs = Address::select('id')->where('city_name', $city)->get();
                $query->whereIn('address_id', $IDs);
            }
        
        }
        
    
        $users = $query->paginate(12);
    
        // Append the query parameters to the pagination links
        $users->appends($request->query());
    
        return view('userPage.searchPage', compact('users', 'crafts', 'cities', 'selectedCraft'));
    }


    public function openCraft(Request $request,$profession = null)
    {
        $selectedCraft = $request->input('craft_name', 'all');
        $selectedProfession = $profession ?? 'all';
        $crafts = Craft::get();
        $cities = Address::distinct()->pluck('city_name', 'city_name')->toArray();
        $villages = [];
    
        $query = User::query()->where('is_worker', 1);
    
        if ($selectedProfession != 'all') {
            $query->whereHas('crafts', function ($query) use ($selectedProfession) {
                $query->where('crafts.id', $selectedProfession); // Specify the table name 'crafts' for the 'id' column
            });
        }
    
        $users = $query->paginate(12);
    
        return view('userPage.searchPage', compact('users', 'cities', 'villages', 'crafts', 'selectedProfession','selectedCraft'));
    }
 

public function nameSearch(Request $request)
{
    $selectedCraft = $request->input('craft_name', 'all');
    $crafts = Craft::get();
    $cities = Address::distinct()->pluck('city_name', 'city_name')->toArray();

    $searchQuery = $request->input('search');

    // Perform the search query to retrieve matching users
    $users = User::where(function ($query) use ($searchQuery) {
        $query->where('fname', 'LIKE', '%' . $searchQuery . '%')
            ->orWhere('lname', 'LIKE', '%' . $searchQuery . '%');
    })
    ->where('is_worker', 1)
    ->paginate();

    // Pass the list of matching users to the view
    return view('userPage.searchPage', compact('users', 'crafts', 'cities', 'selectedCraft'));
}



// public function liveSearch(Request $request)
// {
//     $search = $request->input('search');
//     $users = User::where('fname', 'LIKE', "%$search%")
//     ->orWhere('lname', 'LIKE', "%$search%")
//     ->get();

//                  return response()->json(['users' => $users]);
                
                
// }


public function fiveAd(Request $request)
{
    
    return redirect()->back()->with('message', 'Ad created successfully!');
}



}
