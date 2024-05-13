<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 
    public function index()
    {
        $category = Category::all();
        return view("category.index",compact("category"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view("category.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|min:2|max:100',
            'Description' => 'required|string|min:3|max:255',
        ];
    
       
        $messages = [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'Description.required' => 'The Description field is required.',
        ];
    
      
        $validatedData = $request->validate($rules, $messages);
    
    
        $post = Category::create([
            "name" => $validatedData['name'],
            "Description" => $validatedData['Description']
        ]);
    
        return redirect()->route("Category.index")->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $Category)
    {
       $count = $Category->posts()->count();
        return view("category.show",compact(['Category','count']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $Category)
    {
        return view("category.edit",compact( 'Category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $Category)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'Description' => 'required|string',
        ];
    
        // Custom error messages
        $messages = [
            'name.required' => 'The title field is required.',
            'name.max' => 'The title may not be greater than 255 characters.',
            'Description.required' => 'The body field is required.',
        ];
    
        // Validate the incoming request
        $validatedData = $request->validate($rules, $messages);
    
        // Update the post with validated data
        $Category->update([
            'name' => $validatedData['name'],
            'Description' => $validatedData['Description'],
        ]);
        return redirect()->route("Category.index")->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $Category)
    {
        $Category->delete();
        return redirect()->route('Category.index')->with('success', 'Post deleted successfully.');
    
    }

    
    public function viewdata(){

        $softscat = Category::onlyTrashed()->get();
        return view("Category.Archive",compact('softscat'));
    }
    public function restore($id)

    {
        
        $post = Category::withTrashed()->findOrFail($id);
        $restored = $post->restore();
    
        if ($restored > 0) {
            $totalTrashed = Category::onlyTrashed()->count();
            if ($totalTrashed === 0) {
                return redirect()->route("Category.index");
            }
        }
    
        return redirect()->back();
    }    
public function ForceDelete($id)
{
   
    Category::withTrashed()->findOrFail($id)->forceDelete();
    return redirect()->back();
}
}
