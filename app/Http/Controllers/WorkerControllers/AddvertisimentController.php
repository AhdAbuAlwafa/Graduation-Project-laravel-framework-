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
        dd($request);
        $validated = $request->validate([
          
            'job_des' => 'required',
            'adv_req'=>'required',
        ]);
        
        $advertisements = new Advertisement;
        $advertisements->adv_req = $request->input('adv_req');
        $advertisements->job_des = $request->input('job_des');
        $advertisements-> job_name= $request->input('job_name');
        $advertisements->work_hour=$request->input('work_hour');
        $advertisements->address_id=$request->input('address_id');
        $advertisements->work_period=$request->input('work_period');
        $advertisements->gender=$request->input('gender');
        $advertisements->adv_period=$request->has('adv_period');
        $advertisements->user_id=$request->input('user_id');
        $advertisements->adv_date=$request->input('adv_date');


        $advertisements->save();
         
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
