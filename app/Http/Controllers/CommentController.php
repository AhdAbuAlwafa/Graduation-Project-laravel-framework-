<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\User;
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
   
     public function store(Request $request , $id)
     {
 
         $user = User::find($id)->first();
         $receivedComments = User_Comment::get()->where('worker_id',$id);
         $isRated = Rate::where('reviewable',$id)->where('reviewer',auth()->user()->id)->first();
         $worker = User::with('addresses', 'crafts')->where('id', $id)->first();
         $totalRate = Rate::where('reviewable',$id)->sum('rate');
         $totalReviewers =  Rate::where('reviewable',$id)->count();
         if($totalReviewers == 0 or $totalRate == 0 ){
             $userRate = 0;
         }else {
             $userRate = $totalRate / $totalReviewers;
         }
 
 
         $validated = $request->validate([
             'com_text' => 'required',
         ]);
     
         $user = auth()->user(); 
         $workerId = User::find($id); 
         
     
         // $worker = User::findOrFail($id); // Retrieve the worker model
     
         $user_comments = new User_Comment;
         $user_comments->com_text = $request->input('com_text');
     
         $user_comments->user()->associate($user);
         $user_comments->worker()->associate($worker); // Associate the worker model
     
         $user_comments->save(); 
 
         // Prepare the HTML for the new comment
         $commentHtml = view('userPage.partial', ['comment' => $user_comments])->render();
     
         // Return the JSON response with the comment HTML
         return response()->json(['commentHtml' => $commentHtml]);
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
