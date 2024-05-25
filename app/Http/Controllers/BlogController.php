<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'body' => 'required|string',
            'date' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'category' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }

        Blog::create($validatedData);

        return redirect('/blog')->with('success', 'Blog post created successfully!');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        
        if ($blog->image && Storage::disk('public')->exists('images/' . basename($blog->image))) {
            Storage::disk('public')->delete('images/' . basename($blog->image));
        }

        $blog->delete();

        return redirect('/blog')->with('success', 'Blog deleted successfully');
    }

    public function update(Request $request,$id)
    {
        
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'date' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'category' => 'required|string',
            'body' => 'required|string'
        ]);
        
        $blog = Blog::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($blog->image && Storage::disk('public')->exists('images/' . basename($blog->image))) {
                Storage::disk('public')->delete('images/' . basename($blog->image));
            }
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = $blog->image;
        }

        $blog->update([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'date' => $request->input('date'), 
            'image' => $imagePath,
            'category' => $request->input('category'), 
            'body' => $request->input('body')
        ]);

        return redirect("/blog/{$blog->id}")->with('success', 'Watch updated successfully');
    }
}
