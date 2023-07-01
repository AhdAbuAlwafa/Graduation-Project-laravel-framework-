<?php

namespace App\Http\Controllers\WorkerControllers;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Advertisement;
use App\Models\Craft;

class AddvertisimentController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
       
        $addresses=Address::get();
        $crafts=Craft::get();
        
     return view('workerPage.advertisiment')->with('crafts',$crafts)->with('addresses',$addresses);
       
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
        // $validated = $request->validate([
          
        //     'job_des' => 'required',
        //     'adv_req'=>'required'
        // ]);
        
        $advertisements = new Advertisement;
        $advertisements->adv_req = $request->adv_req;
        $advertisements->job_des = $request->job_des|| 'null';
        $advertisements-> job_name= $request->job_name;
        $advertisements->work_hour=$request->work_hour || 'null';
        $advertisements->address_id=$request->address_id;
        $advertisements->work_period=$request->work_period;
        $advertisements->gender=$request->gender;
        $advertisements->adv_period=$request->adv_period;
        $advertisements->user_id=auth()->user()->id;

        $advertisements->save();
         return view(route('worker.advertisiment'));

    
    }

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
