<?php

namespace App\Http\Controllers;
use App\Models\User_Comment;

use Illuminate\Http\Request;

class ComentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User_Comment::get();
        return view('user_comment/list2', ['user_comments' => $data]);
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
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id =$request ->id;
        $items = User_Comment::find($id);
        $items->delete();
        
        return redirect()->route('user_comment.list2')->with('success', 'report details has been successfully deleted');
    } 
    
}
