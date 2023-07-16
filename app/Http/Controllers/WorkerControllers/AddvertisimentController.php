<?php

namespace App\Http\Controllers\WorkerControllers;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Advertisement;
use App\Models\Craft;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;



class AddvertisimentController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
       
        $addresses=Address::get();
        $crafts=Craft::get();
        $cities = Address::distinct()->pluck('city_name', 'city_name')->toArray();

     return view('workerPage.advertisiment')->with('crafts',$crafts)->with('cities',$cities);
       
    }


   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * {{ auth()->user()->id }}
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
           // 'work_hour'=> ($request->is_worker == 1) ? ['required']: '',
            //'adv_req'=> ($request->is_worker == 1) ? ['required','min:20','max:1500','string']: '',
            'job_des'=>['required','min:20','max:1500','string'],
             'job_name'=>['required','string'],
             'adv_period'=>['required'],
             'work_period'=>['required'],
             'gender'=>['required'],
             'village_name'=>['required'],
             'city_name'=>['required'],



        ]);
        
        $advertisements = new Advertisement;
        $advertisements->adv_req = $request->adv_req;
        $advertisements->job_des = $request->job_des;
        $advertisements-> job_name= $request->job_name;
        $advertisements->work_hour=$request->work_hour ||null;
        $advertisements->address_id= $request->village_name;

        $advertisements->work_period=$request->work_period;
        $advertisements->gender=$request->gender;
        $advertisements->adv_period=$request->adv_period;
        $advertisements->user_id=auth()->user()->id;

        $advertisements->save();
         
         return redirect(route('worker.advertisiment' ));

        $user = Auth::user();
    
        $maxAdsCount = 5;
        if ($user && $user->is_worker == 1 && $user->ads_count >= $maxAdsCount) {
            // Worker has reached the maximum allowed ads
            return response()->json(['message' => 'Worker, you have reached the maximum number of allowed ads']);
        } elseif ($user && $user->is_worker == 0 && $user->ads_count >= $maxAdsCount) {
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
    
        $advertisement->save();
    
        if ($user && $user->is_worker == 0) {
            $user->ads_count++;
        } elseif ($user && $user->is_worker == 1) {
            $user->ads_count++;
        }
    
        return redirect(route('home'));
    }
    
    
     


    // public function stor1e(Request $request)
    // {

    //     $user = Auth::user(); 

    // $maxAdsCount = 5;
    // if ($user && $user->is_worker == 0 && $user->ads_count >= $maxAdsCount) {
    //     // Regular user has reached the maximum allowed ads
    //     return redirect()->back()->with('message', ' User , You have reached the maximum number of allowed ads.');
    // } elseif ($user && $user->is_worker == 1 && $user->ads_count >= $maxAdsCount) {
    //     // Worker has reached the maximum allowed ads
    //     return redirect()->back()->with('message', 'Worker , You have reached the maximum number of allowed ads.');
    // }

    // // Increment the ads_count field for the user or worker
    // if ($user->is_worker == 0) {
    //     $user->ads_count++;
    //     $user->save();
    // } elseif ($user->is_worker == 1) {
    //     $user->ads_count++;
    //     $user->save();
    // }


    //     $advertisements = new Advertisement;
    //     $advertisements->adv_req = $request->adv_req;
    //     $advertisements->job_des = $request->job_des || 'null';
    //     $advertisements->job_name = $request->job_name;
    //     $advertisements->work_hour = $request->work_hour || 'null';
    //     $advertisements->address_id = $request->address_id || 'null';
    //     $advertisements->work_period = $request->work_period;
    //     $advertisements->gender = $request->gender;
    //     $advertisements->adv_period = $request->adv_period;
    //     $advertisements->user_id = auth()->user()->id;
    //     $advertisements->created_at = Carbon::now();
    //     $advertisements->expires_at = Carbon::now()->addDays($request->input('adv_period'));
    
        
    //     // Save the advertisement
    //     $advertisements->save();
         
    //     return redirect(route('workerPage.advertisiment'));
    // }
    



    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $crafts = Craft::all();
        $cities = Address::distinct()->pluck('city_name', 'city_name')->toArray();
        $villages = Address::distinct()->pluck('village_name', 'village_name')->toArray();
    
        $selectedCraft = $request->input('craft_name');
        $selectedCity = $request->input('city_name');
        $selectedVillage = $request->input('village_name');
    
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
    
        $advertisements = $query->orderBy('created_at', 'desc')->paginate(12);
    
        return view('userPage.advertisementsPage', compact('advertisements', 'crafts', 'cities', 'villages', 'selectedCraft','selectedCity','selectedVillage'));
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
