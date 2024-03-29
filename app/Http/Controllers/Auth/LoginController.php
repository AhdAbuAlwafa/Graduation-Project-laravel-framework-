<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Craft;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

        $input = $request->all();
        $address=Address::get();
        $crafts=Craft::get();

        $cities = Address::pluck('city_name','city_name')->all();

        $this->validate($request, [
            'number' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('number' => $input['number'], 'password' => $input['password']))) {
            if (auth()->user()) {

                if(auth()->user()->is_worker == 2){
                    return view('welcome');
        
                }else{
                    $crafts=Craft::get();
                    return redirect(route('home',compact('crafts')));
                }
        
            }  
        }else {
            
             return view('auth.login',compact('address','crafts','cities'))
                 ->with('error', 'Phone or Password is wrong.');
        }
      
    }
    public function showLoginForm()
    {

        $cities=Address::distinct()->pluck('city_name','city_name')->toArray();
        $address=Address::get();
        $crafts=Craft::get();
        return view('auth.login' , compact('cities','address', 'crafts'));
    }
    public function logout(){
        auth()->logout();
        return redirect(route('home'));
    }
}
