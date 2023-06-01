<?php

namespace App\Http\Controllers\UserControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Advertisement;
use App\Models\Craft;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\New_;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addresses=Address::get();
        $crafts=Craft::get();
        return view('userPage.addAdv',['addresses'=>$addresses],['crafts'=>$crafts]);

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
    //     $adv=New Advertisement();
    //   $adv->name=$request->name;
    //   $adv->job_des=$request->job_des;

    // $data=  $adv->save();
    //   if($data){
    //   return response()->json([
    //     'status'=>400,
    //     'error'=>'something wrong'
    //   ]);
    // }
    // else{
    //     return response()->json([
    //         'status'=>200,
    //         'error'=>'done'
    //       ]);
        
    //     }

   $advertisement= Advertisement::create([

        'job_name'=>$request->input('job_name'),
        'job_des'=>$request->input('job_des'),
       'work_hour'=>$request->input('work_hour'),
       'address_id'=>$request->input('address_id'),
       'work_period'=>$request->input('work_period'),
       'gender'=>$request->input('gender')
    ]);



  //  $dd= $advertisement->addresses()->sync( $request->input('address_id'));

     return redirect()->route('userPage.who-are-we');


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
