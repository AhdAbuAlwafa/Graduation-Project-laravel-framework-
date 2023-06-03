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
     */
    
    public function show(string $id)
    {
        $addresses=Address::get();
        $user=User::with('crafts','addresses',)->where('id',$id)->first();
        return view('userPage.userProfile',compact('user'))->with('addresses',$addresses);
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
            'number'=>'required|regex:/(05)[69][0-9]{7}/|unique:users'
            
        ]);
   
        $user = User::findOrFail($id);

        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->number = $request->input('number');
        $user->save();
        return redirect(route('userPage.userProfile', $id ));

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
