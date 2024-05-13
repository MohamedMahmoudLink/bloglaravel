<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Comments extends Controller
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
   
        return view("posts.show");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = Auth::id();
    $validatedData = $request->validate([
        'content' => 'required|string|max:255',
        
    ]);


    $comment = new Comment();
    $comment->content = $validatedData['content'];
    $comment->user_id = $userId;
    $comment->post_id = $request->post_id;
    
    $comment->save();

    // Redirect back or to a specific route
    return redirect()->route('posts.show',$request->post_id)->with('success', 'Comment created successfully!');
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
    public function destroy(string $id)
    {
        //
    }
}
