<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class WorkerPageController extends Controller
{
    public function show($id)
    {
        $worker = User::with('addresses', 'crafts')->where('id', $id)->first();
        return view('workerPage.showWorker', compact('worker'));
    }
    
}
