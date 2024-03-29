<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Address;
use App\Models\Advertisement;
use App\Models\Worker;

use App\Models\Craft;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;
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
    
    public function show()
    {
        $user=User::with('crafts','addresses',)->where('id',auth()->user()->id)->first();
        

        $crafts=Craft::get();
        $cities = Address::pluck('city_name', 'id');
        $village = Address::pluck('village_name', 'id');
        $advertisements=Advertisement::get()->where('user_id', auth() ->user()->id);


        return view('userPage.userProfile',compact('user','cities','village','advertisements','crafts'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       

    }
    public function update(Request $request)
    {


        $validated = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'number'=>'required|regex:/[69][0-9]{7}/',
            



        ]);
        

        $crafts = Craft::get();
    //     $crafts->name = $validatedData['name'];
    //    //$crafts=Craft::get();
    //     $crafts->save();
        $user = User::find(auth()->user()->id);
        $user->save();
        $user->crafts()->attach($request['craft_name']);

        $address=Address::where('village_name',$request->village_name)->first();

        user::where('id',auth()->user()->id)->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'number' => $request->number,
            
            'address_id'=>$address->id
        ]);

        return redirect(route('userPage.userProfile',auth()->user()->id ,compact('crafts')));
    }
    /**
     * Update the specified resource in storage.
     */
    
     public function becomeWorker(Request $request, string $id)
     {
        $validator = Validator::make($request->all(), [
        'craft_name' => 'required',
        'craft_description' => 'required|min:100|max:1500|string',
    ]);

    if ($validator->fails()) {
        return response()->json(['success' => false, 'error' => $validator->errors()->toArray()]);
    }else
    {

       $user= User::where('id',auth()->user()->id)->first();
       $user->description = $request->input('craft_description');
       $user->is_worker=1;
        $user->save();
        $user->crafts()->attach($request->input('craft_name'));

        return response()->json(['success' => true]);
    }

     }

   


    public function changePassword(Request $request)
    {
        $request->validate([
            'old' => 'required',
            'password' => 'required|confirmed',
        ]);
        if(!Hash::check($request->old, auth()->user()->password)){
            return back()->with("error", "كلمة السر القديمة ليست صحيحة");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with("status", "تم تغيير كلمة السر بنجاح");

    }
    
    public function showPassChange(){

        return (view('userpage.changepass'));
    }



    public function changeImg(Request $req){
        $validator = Validator::make($req->all(),[
            'image'=>'required|image'
        ]);
        if ($validator->fails()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{
            $imgName= md5(time()).'.'.$req->image->extension();
            $req->image->move(public_path('images'),$imgName);
            User::whereId(auth()->user()->id)->update([
                'image'=>$imgName
            ]);

            return response()->json(['status'=>1,'image'=>$imgName] );

        }
    }
    public function deleteCraft(Request $request)
{
    $user = User::findOrFail($request->input('user'));
    $craft = $request->input('craft');

    try {
        $user->crafts()->detach($craft);

        return response()->json(['message' => 'تم حذف المهنة بنجاح']);
    } catch (\Exception $e) {
        return response()->json(['message' => 'لقد فشل في حذف المهنة'], 500);
    }
}

public function deleteAllCrafts(Request $request)
{
    $user = User::findOrFail($request->input('user'));

    try {
        $user->crafts()->detach();

        return response()->json(['message' => 'لقد تم حذف جميع المهن بنجاح']);
    } catch (\Exception $e) {
        return response()->json(['message' => 'لقدفش في حذف جميع المهن'], 500);
    }
}






    public function destroy(string $id)
    {
        //
    }
}
