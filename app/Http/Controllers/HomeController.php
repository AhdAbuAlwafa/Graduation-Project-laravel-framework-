<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Advertisement;
use App\Models\Craft;
use App\Models\User;
use Carbon\Carbon;
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
        $cities = Address::distinct()->pluck('city_name', 'city_name')->toArray();
        $crafts=Craft::get();
        $user = Auth::user();
        $workAloneAds = Advertisement::where('advertisement_type', 'workAlone')->limit(6)->get();
        $workshopAds = Advertisement::where('advertisement_type', 'workshops')->limit(6)->get();
        return view('home', compact( 'crafts','workAloneAds', 'workshopAds','user','cities'));    
    }

    public function store(Request $request)
    {
        $user = Auth::user();
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
         

        if ($request->input('advertisement_type') === 'workshops') {
            $ads_type = 'workshops';
        } else {
            $ads_type = 'workAlone';
        }

        $currentMonthAdsCount = Advertisement::where('user_id', $user->id)
        ->whereMonth('created_at', Carbon::now()->month)
        ->count();

        $maxDownloadsPerMonth = 40;
        if ($user && $user->is_worker == 1 && $currentMonthAdsCount >= $maxDownloadsPerMonth) {
            // User has reached the maximum allowed downloads for the current month
            return response()->json(['message' => 'You have reached the maximum number of allowed downloads for this month']);
        }elseif ($user && $user->is_worker == 0 && $currentMonthAdsCount >= $maxDownloadsPerMonth) {
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
            $user->save();
        } elseif ($user && $user->is_worker == 1) {
            $user->ads_count++;
            $user->save();

        }
    
        $currentMonthAdsCount1 = Advertisement::where('user_id', $user->id)
        ->count();
        dd($currentMonthAdsCount1);
        return redirect(route('home' ));

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
