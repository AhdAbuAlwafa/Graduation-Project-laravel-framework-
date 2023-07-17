<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Advertisement;
use App\Models\Craft;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Log;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        $crafts=Craft::get();
        $user = Auth::user();
        $workAloneAds = Advertisement::where('advertisement_type', 'workAlone')->limit(6)->get();
        $workshopAds = Advertisement::where('advertisement_type', 'workshops')->limit(6)->get();
        return view('home', compact( 'crafts','workAloneAds', 'workshopAds','user'));    
    }


    public function show()
    {
        $is_worker=Auth::user()->is_worker;
         if($is_worker==0)
         {
            return view('home');
         }
         if($is_worker==1)
         {
            return view('home');
         }
         else{
            return view('welcome');
         }




    }
    
    public function openCraft(Request $request,$profession = null)
    {
        $selectedCraft = $request->input('craft_name', 'all');
        $selectedProfession = $profession ?? 'all';
        $crafts = Craft::get();
        $cities = Address::distinct()->pluck('city_name', 'city_name')->toArray();
        $villages = [];
    
        $query = User::query ();
    
        if ($selectedProfession != 'all') {
            $query->whereHas('crafts', function ($query) use ($selectedProfession) {
                $query->where('crafts.id', $selectedProfession); // Specify the table name 'crafts' for the 'id' column
            });
        }
    
        $users = $query->orderBy('all_evl', 'desc')->paginate(12);
    
        return view('userPage.searchPage', compact('users', 'cities', 'villages', 'crafts', 'selectedProfession','selectedCraft'));
    }


}
