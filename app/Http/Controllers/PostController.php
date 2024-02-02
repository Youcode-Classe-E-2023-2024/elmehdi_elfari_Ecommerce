<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(){
        $posts = Post::all();
        return view('/home', compact('posts'));
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request)
    {
        $validated = request()->validate([
            'title' => 'required|min:3',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'price' => 'required|min:3',
            'description' => 'required|max:25',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image');
            $extension = $imagePath->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            $path = 'uploads/post/';
            $imagePath->move($path, $filename);

            // Set the 'image' field in the $validated array
            $validated['image'] = $filename;
        }

        Post::create($validated);

        return redirect('create')->with('status', 'Product added successfully');
    }


    public function edit(int $id){
        $product = Post::findOrFail($id);
        return view('edit',compact('product'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'title' => 'required|min:3',
            'price' => 'required|min:3',
            'description' => 'required|max:25',
        ]);

        $post = Post::find($id);
        $post->update($validated);

        return redirect('/home')->with('status', 'Product updated successfully');
    }

    public function destroy(int $id) {
        $product = Post::findOrFail($id);
        $product->delete();
        return redirect('/')->with('status' ,'Product delete successfully');
    }
}
