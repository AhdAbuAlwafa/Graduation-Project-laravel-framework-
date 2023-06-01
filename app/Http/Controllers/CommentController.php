<?php

namespace App\Http\Controllers;
use App\Models\User_Comment;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_comments=User_Comment::get();
        return view('user_comment/addComment')->with('user_comments',$user_comments);
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
        dd($request);

        $validated = $request->validate([
          
            'com_text' => 'required',
            
        ]);
        $user_comments=New User_Comment;
        $user_comments->com_text =$request->input('com_text');
        $user_comments->save();





    }

    /**
     * Display the specified resource.
     */
    
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user_comments=User_Comment::findOrFail($id);
        return view('user_comment/editComment', [ 'user_comments' =>$user_comments]);
        
        
        /**return view('user_comment.editComment', [
          *  'user_comment' => User_Comment::findOrFail($id)
          ]);*/
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        

        $validated = $request->validate([
          
            'com_text' => 'required',
            
        ]);

        $user_comments=User_Comment::findOrFail($id);
        /** 
         * 'com_text'=>$request->com_text;
        */

            $user_comments->update([
               $user_comments->com_text =$request->input('com_text'),   
            ]);
            return redirect(route('user_comment.editComment', $id));
    }

    /**
     * Remove the specified resource from storage.
     */
    
       
    
    
}
