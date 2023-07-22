<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Craft;
use App\Models\Rate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function openCraft(Request $request, $profession = null)
    {

        $selectedCraft = $request->input('craft_name', 'all');
        $selectedProfession = $profession ?? 'all';
        $crafts = Craft::get();
        $cities = Address::distinct()->pluck('city_name', 'city_name')->toArray();
        $villages = [];

        $query = User::query()->where('is_worker', 1)->with('rates');

        if ($selectedProfession != 'all') {
            $query->whereHas('crafts', function ($query) use ($selectedProfession) {
                $query->where('crafts.id', $selectedProfession); // Specify the table name 'crafts' for the 'id' column
            });
        }


        $users = $query->paginate();


        // Calculate average rating for each user and store in an array
        // $userRates = [];
        // foreach ($users as $user) {
        //     $totalRateUser = Rate::where('reviewable', $user->id)->sum('rate');
        //     $totalReviewersUser = Rate::where('reviewable', $user->id)->count();
        //     $userRate = ($totalReviewersUser == 0) ? 0 : $totalRateUser / $totalReviewersUser;
        //     $userRates[$user->id] = $userRate;
        // }
        return view('userPage.searchPage', compact('users', 'cities', 'villages', 'crafts', 'selectedProfession', 'selectedCraft'));
        // return $users;
    }

    

    //     $users = $query->orderByDesc(function ($query) {
    //         return Rate::selectRaw('AVG(rate) as average_rate')
    //             ->whereColumn('reviewable', 'users.id')
    //             ->limit(1);
    //     })->paginate(12);

    // // Calculate $userRate for each user individually and store it in an array
    // $userRates = [];
    // foreach ($users as $user) {
    //     $totalRateUser = Rate::where('reviewable', $user->id)->sum('rate');
    //     $totalReviewersUser = Rate::where('reviewable', $user->id)->count();
    //     $userRate = ($totalReviewersUser == 0) ? 0 : $totalRateUser / $totalReviewersUser;
    //     $userRates[$user->id] = $userRate;
    // }


    public function filterNav(Request $request)
    {

        $selectedCraft = $request->input('craft_name', 'all');
        $crafts = Craft::get();
        $cities = Address::distinct()->pluck('city_name', 'city_name')->toArray();
        $craft = $request->input('craft_name');
        $city = $request->input('city_name');
        $village = $request->input('village_name');

        $query = User::query()->where('is_worker', 1)->with('addresses')->with('crafts');

        // Apply filters based on craft, city, and village
        if ($village == $city && $city == $craft && $craft == 'all') {
            // No filters selected, retrieve all users
        } else if ($craft != 'all') {
            if ($village != 'all') {
                // Filter by craft and village
                $query->whereHas('addresses', function ($qu) use ($village) {
                    $qu->where('addresses.id', $village);
                });
                $query->whereHas('crafts', function ($qu) use ($craft) {
                    $qu->where('crafts.id', $craft);
                });
            } else if ($village == 'all') {
                if ($city != 'all') {
                    // Filter by craft and city
                    $query->whereHas('addresses', function ($qu) use ($city) {
                        $qu->where('addresses.city_name', $city);
                    });
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
                $query->whereHas('addresses', function ($qu) use ($village) {
                    $qu->where('addresses.id', $village);
                });
            } else {
                // Filter by city only
                $query->whereHas('addresses', function ($qu) use ($city) {
                    $qu->where('addresses.city_name', $city);
                });
            }
        }

        $users = $query->paginate(12);

        // Append the query parameters to the pagination links
        $users->appends($request->query());

        return view('userPage.searchPage', compact('users', 'crafts', 'cities', 'selectedCraft'));
    }


    public function searchSuggestions(Request $request)
    {
        $selectedCraft = $request->input('craft_name', 'all');
    $crafts = Craft::get();
    $cities = Address::distinct()->pluck('city_name', 'city_name')->toArray();
        $searchQuery = $request->input('query');
        
        // Perform the search query to retrieve matching users
        $users = User::where(function ($query) use ($searchQuery) {
            $query->where('fname', 'LIKE', $searchQuery . '%')
                ->orWhere('lname', 'LIKE', $searchQuery . '%');
        })
        ->where('is_worker', 1)
        ->get();
    
        // Return the matching user names as JSON response
        return response()->json($users);
    }

    public function nameSearch(Request $request)
    {
        $searchQuery = $request->input('search');
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
        ->paginate(12);
    
        // Pass the list of matching users and the search query to the view
        return view('userPage.searchPage', compact('users', 'crafts', 'cities', 'selectedCraft', 'searchQuery'));
    }
    



    



    public function fiveAd(Request $request)
    {
        return redirect()->back()->with('message', 'Ad created successfully!');
    }
}
