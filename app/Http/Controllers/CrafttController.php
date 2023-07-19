<?php

namespace App\Http\Controllers;
use App\Models\Craft;

use Illuminate\Http\Request;

class CrafttController extends Controller
{
   
    public function index()
    {
        $data = Craft::get();
        return view('crafts.list', ['crafts' => $data]);
    }
    public function add(Request $request){
          
          
        return view('crafts.add');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            
            'craft_name' => 'required',

            'image_path' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]); 
        $newImageName = time() . '-' . $request->name . '.' .
            $request->image_path->extension();

        $craft = new Craft;
        $craft->craft_name =$request->input('craft_name');
        $craft->admin_id=auth()->user()->id;
        $request->image_path->move(public_path('images'), $newImageName);
        $craft->image_path = $newImageName;
        $craft->save();
        
         return view('crafts.add'); 
       
    }

    
    public function edit(string $id)
    {

        $craft=Craft::find($id);
        return view('crafts.edit', compact('craft'));

    }

    

    public function update(Request $request ,string $id)
    {
        $validated = $request->validate([
            
            'craft_name' => 'required',

            'image_path' => 'required|mimes:jpg,png,jpeg|max:5048'
            
        ]);
        //$newImageName = time() . '-' . $request->name . '.' .
        $imgName= md5(time()).'.'.$request->image_path->extension();
        $request->image_path->move(public_path('images'),$imgName);
           $craft=Craft::where('id',$id)->first();
           
            $craft->update([
            
                'craft_name' => $request->input('craft_name'),
                'image_path' => $request->input('image_path'),

               // $craft->image_path = $imgName,
                
            ]);

        return redirect(route('crafts.list' ));
    }

    public function destroy(Request $request)
    {
        $id =$request ->id;
        $items = Craft::find($id);
        $items->delete();
        
        return redirect()->route('crafts.list')->with('success', 'report details has been successfully deleted');
    } 
    
}

    
