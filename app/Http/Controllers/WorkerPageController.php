<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\User;
use App\Models\User_Comment;
use Illuminate\Http\Request;

class WorkerPageController extends Controller
{
    public function show($id)
    {
        $user = User::where('id',$id)->first();
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
    
        //return $user;
         return view('userPage.otherUserProfile2', compact('worker','userRate','isRated','receivedComments','user'));
    }

    public function rate(Request $request ){
        $isRated = Rate::where('reviewable',$request['id'])->where('reviewer',auth()->user()->id)->count();
        if ($isRated > 0 ){
            Rate::where('reviewable',$request['id'])->where('reviewer',auth()->user()->id)->first()->update([
                'rate'=>$request['rate']
            ]);
        }else {
            $rate = new Rate();
            $rate->rate = $request['rate'];
            $rate->reviewable = $request['id'];
            $rate->reviewer = auth()->user()->id;
            $rate->save();
        }
    }

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



}
