<?php

namespace App\Http\Controllers\WorkerControllers;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Advertisement;
use App\Models\Craft;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;



class AddvertisimentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::user();
        $addresses = Address::get();
        $crafts = Craft::get();
        $cities = Address::distinct()->pluck('city_name', 'city_name')->toArray();

        return view('workerPage.advertisiment')->with('crafts', $crafts)->with('cities', $cities)->with('user', $user);
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function adsInHome()
    {
        $user = Auth::user();
        $workAloneAds = Advertisement::where('advertisement_type', 'workAlone')->limit(6)->get();
        $workshopAds = Advertisement::where('advertisement_type', 'workshops')->limit(6)->get();
        return view('home', compact('workAloneAds', 'workshopAds', 'user'));
    }


    public function store(Request $request)
    {
        $user = Auth::user();
        $validated = $request->validate([
            // 'work_hour'=> ($request->is_worker == 1) ? ['required']: '',
            //'adv_req'=> ($request->is_worker == 1) ? ['required','min:20','max:1500','string']: '',
            'job_des' => ['required', 'min:20', 'max:1500', 'string'],
            'job_name' => ['required', 'string'],
            'adv_period' => ['required'],
            'work_period' => ['required'],
            'gender' => ['required'],
            'village_name' => ['required'],
            'city_name' => ['required'],



        ]);


        if ($request->input('advertisement_type') === 'workshops') {
            $ads_type = 'workshops';
        } else {
            $ads_type = 'workAlone';
        }

        $currentMonthAdsCount = Advertisement::where('user_id', $user->id)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();

        $maxDownloadsPerMonth = 5;
        if ($user && $user->is_worker == 1 && $currentMonthAdsCount >= $maxDownloadsPerMonth) {
            // User has reached the maximum allowed downloads for the current month
            return response()->json(['message' => 'You have reached the maximum number of allowed downloads for this month']);
        } elseif ($user && $user->is_worker == 0 && $currentMonthAdsCount >= $maxDownloadsPerMonth) {
            // Regular user has reached the maximum allowed ads
            return response()->json(['message' => 'User, you have reached the maximum number of allowed ads']);
        }



        $advertisement = new Advertisement;
        $advertisement->adv_req = $request->adv_req;
        $advertisement->job_des = $request->job_des;
        $advertisement->job_name = $request->job_name;
        $advertisement->work_hour = $request->work_hour ? $request->work_hour : null;
        $advertisement->address_id = $request->address_id ? $request->address_id : null;
        $advertisement->work_period = $request->work_period;
        $advertisement->gender = $request->gender;
        $advertisement->adv_period = $request->adv_period;
        $advertisement->user_id = auth()->user()->id;
        $advertisement->created_at = Carbon::now();
        $advertisement->expires_at = Carbon::now()->addDays($request->input('adv_period'));
        $advertisement->advertisement_type = $ads_type;
        $advertisement->created_at = Carbon::now();
        $advertisement->save();

        if ($user && $user->is_worker == 0) {
            $user->ads_count++;
        } elseif ($user && $user->is_worker == 1) {
            $user->ads_count++;
        }

        return redirect(route('worker.advertisiment'));
    }



    /**
     * Display the specified resource.
     */
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

    if ($isWorker == 0) {
        if ($selectedType && $selectedType !== 'all') {
            $query->where('advertisement_type', $selectedType);
        } else {
            $query->where('advertisement_type', 'workAlone');
        }
    } elseif ($isWorker == 1) {
        if ($selectedType === 'workshops') {
            $query->where('advertisement_type', 'workshops');
        } else {
            $query->where('advertisement_type', 'workAlone');
        }
    }

    $advertisements = $query->orderBy('created_at', 'desc')->paginate(12);

    return view('advertisement', compact('advertisements', 'crafts', 'cities', 'villages', 'selectedCraft', 'selectedCity', 'selectedVillage'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
