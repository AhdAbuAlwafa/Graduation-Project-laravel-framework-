<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Address;
use App\Models\Craft;
use App\Models\UserCraft;
use Illuminate\Http\Request;


class WorkeProfilerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


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
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $worker=User::with('crafts','addresses',)->where('id',$id)->first();
        $cities = Address::pluck('city_name', 'id');
        $village = Address::pluck('village_name', 'id');
        $craft=Craft::get();
      //  echo($worker);

        return view('workerPage.workerProfile',compact('worker','cities','village','craft'));
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
        $validated = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'number'=>'required|regex:/[69][0-9]{7}/',
            'description'=>'required',


        ]);

        $address=Address::where('village_name',$request->village_name)->first();
        $craft=Craft::where('craft_name',$request->craft_name)->first();
        user::where('id',$id)->with('crafts')->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'number' => $request->number,
            'description'=>$request->description,
            'address_id'=>$address->id,

        ]);
        $usercraft=UserCraft::where('user_id',$id)->first();
        //$usercraft->timestamps = false; // Because there is no "updated_at" column in usercraft tabel
        $usercraft->update([
            'craft_id'=>$craft->id,

            
        ]);


        return redirect(route('workerPage.workerProfile', $id ));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
