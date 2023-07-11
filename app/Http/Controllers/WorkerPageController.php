<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\User;
use Illuminate\Http\Request;

class WorkerPageController extends Controller
{
    public function show($id)
    {
        $isRated = Rate::where('reviewable',$id)->where('reviewer',auth()->user()->id)->first();

        $worker = User::with('addresses', 'crafts')->where('id', $id)->first();
        $totalRate = Rate::where('reviewable',$id)->sum('rate');
        $totalReviewers =  Rate::where('reviewable',$id)->count();
        if($totalReviewers == 0 or $totalRate == 0 ){
            $userRate = 0;
        }else {
            $userRate = $totalRate / $totalReviewers; 
        }
    


        return view('workerPage.showWorker', compact('worker','userRate','isRated'));
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

}
