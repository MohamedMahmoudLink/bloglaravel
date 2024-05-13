<?php

namespace App\Http\Controllers;

use App\Http\Requests\storepost;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function __construct(){

        

        // $this->middleware('auth')->only(["create"]);

     
     }



    public function index()

    {

        $posts = Post::paginate(5);
      
    
      return view("posts.index",compact("posts"));
    }



// Start */*/*/*/*/*/*/*// **** Soft Delete */*/*/*/*/*/*/*// **** 
    public function viewdata(){

        $softs = Post::onlyTrashed()->get();
        return view("posts.Archive",compact("softs"));
    }
    public function restore($id)
    {



        $post = Post::withTrashed()->findOrFail($id);

        $this->authorize("restoree",$post);
 
        $restored = $post->restore();
    
        if ($restored > 0) {
            $totalTrashed = Post::onlyTrashed()->count();
            if ($totalTrashed === 0) {
                return redirect()->route("posts.index");
            }
        }
    
        return redirect()->back();
    }    
public function ForceDelete($id)
{
    $post = Post::withTrashed()->findOrFail($id);
    $this->authorize("restoree",$post);
   $post= Post::withTrashed()->findOrFail($id)->forceDelete();
   
    return redirect()->back();
}

// End */*/*/*/*/*/*/*// **** Soft Delete */*/*/*/*/*/*/*// **** 




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $cate = Category::all();
        return view("posts.create",compact("cate"));
    }

    /**
     * Store a newly created resource in storage.
     */
   



     public function store(storepost $request)
     {
        
     

         $userId = Auth::id();
    
         $post = Post::create([
             "title" => $request['title'],
             "body" => $request['body'],
             "category_id" => $request['category_id'],
             "user_id" => $userId,
         ]);
     
         return redirect()->route("posts.index")->with('success', 'Post created successfully.');
     }
     
    
    

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $commentsz = $post->comments()->paginate(2); // ترقيم 2 تعليق في كل صفحة
        return view("posts.show",compact( 'post','commentsz'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        
        $this->authorize('post_update', $post );
        return view("posts.edit",compact( 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('post_delete', $post );
        
        $rules = [
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ];
    
        // Custom error messages
        $messages = [
            'title.required' => 'The title field is required.',
            'title.max' => 'The title may not be greater than 255 characters.',
            'body.required' => 'The body field is required.',
        ];
    
        // Validate the incoming request
        $validatedData = $request->validate($rules, $messages);
    
        // Update the post with validated data
        $post->update([
            'title' => $validatedData['title'],
            'body' => $validatedData['body'],
        ]);
    
        return redirect()->route("posts.index")->with('success', 'Post updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
  
        $this->authorize('post_delete', $post );
    $post->delete();
    return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');


       
    
    }
}
