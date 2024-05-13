<?php

namespace App\Http\Controllers;
use  App\Models\User;
use Illuminate\Http\Request;
use  App\Models\Post;
use Illuminate\Support\Facades\Gate;

use function Pest\Laravel\post;

class UserController extends Controller
{
   


    public function show (User $id){

        $userPosts = Post::where('user_id',$id->id)->get();
$user = User::find($id)->first();

     return view("UserProfile.show",compact(["user","userPosts"]));

    }




   public function edit(User $id)
{
    $user = User::findOrFail($id->id);


    $this->authorize('update-user', $user  );

    return view("UserProfile.edit", compact("user"));
}

public function update(Request $request, User $id)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,'.$id->id,

    ]);

    $user = User::findOrFail($id->id);

    $this->authorize('update-user', $user  );
  


    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];


    $user->save();

    return redirect()->route('user.show', $user->id)->with('success', 'User updated successfully');
}

    

    
}
