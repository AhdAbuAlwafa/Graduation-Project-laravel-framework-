<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Address;

use Illuminate\Http\Request;

class UserProfileController extends Controller
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
     *  $addresses=Address::get();
     */
    
    public function show(string $id)
    {
       
        $user=User::with('crafts','addresses',)->where('id',$id)->first();
        $cities = Address::pluck('city_name', 'id');
        $village = Address::pluck('village_name', 'id');
        return view('userPage.userProfile',compact('user','cities','village'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'number'=>'required|regex:/(05)[69][0-9]{7}/|unique:users',
            'password'=>'required'
            
        ]);
        $address=Address::where('village_name',$request->village_name)->first();

        user::where('id',$id)->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'number' => $request->number,
            'password'=>$request->password,
            'address_id'=>$address->id
        ]);
        return redirect(route('userPage.userProfile', $id ));
    
/**
         * $addressId=Address::get('id')->where('village_name',$request->village_name);  
         *  user::find($id)->with('addresses')->update([
         * 'fname' => $request->fname,
         *             'lname' => $request->lname,
         * 'number' => $request->number,
         *  'password'=>$request->password,
         * 'address_id'=>$addressId
         *  ]);
         */
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
