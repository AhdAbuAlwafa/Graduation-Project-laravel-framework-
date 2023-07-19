<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Craft;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserCraft;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request ;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $req)
    {

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function register(Request $req)
    {

         User::class;

        $user = new User();

        $validator =validator::make( $req->all(), [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string',  'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'description'=> ($req->is_worker == 1) ? ['required','min:10','max:1500','string']: '',
            'is_worker'=>['required','in:1,0'],
            'gender'=>['required','in:1,0'],


        ]);
        if (!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{

            $user = new User();
            $user->fname = $req['fname'];
            $user->lname = $req['lname'];
            $user->number = $req['number'];
            $user->password = Hash::make($req['password']);
            $user->address_id =$req['village_name'];
            $user->description = $req['description'];
            $user->gender = $req['gender'];
            $user->is_worker=$req['is_worker'];
            $user->save();
            $user->crafts()->attach($req['craft']);








                return response()->json(['status'=>1,'msg'=> "تم التسجيل بنجاح"]);


        }










    }
}
