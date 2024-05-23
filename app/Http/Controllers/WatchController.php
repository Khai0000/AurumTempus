<?php

namespace App\Http\Controllers;

use App\Models\Watch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WatchController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'title' => 'required|string',
            'price' => 'required|numeric',
            'material_type' => 'required|string',
            'origin' => 'required|string',
            'strap_color' => 'required|string',
            'quantity' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'tag' => 'required|string'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }
        
        Watch::create([
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'material_type' => $request->input('material_type'),
            'origin' => $request->input('origin'),
            'strap_color' => $request->input('strap_color'),
            'quantity' => $request->input('quantity'),
            'image' => $imagePath,
            'tag' => $request->input('tag')
        ]);

        return redirect('/products');    
    }

    public function destroy($id)
    {
        $watch = Watch::findOrFail($id);
        
        if ($watch->image && Storage::disk('public')->exists('images/' . basename($watch->image))) {
            Storage::disk('public')->delete('images/' . basename($watch->image));
        }

        $watch->delete();

        return redirect('/products')->with('success', 'Watch deleted successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'price' => 'required|numeric',
            'material_type' => 'required|string',
            'origin' => 'required|string',
            'strap_color' => 'required|string',
            'quantity' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'tag' => 'required|string'
        ]);

        $watch = Watch::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($watch->image && Storage::disk('public')->exists('images/' . basename($watch->image))) {
                Storage::disk('public')->delete('images/' . basename($watch->image));
            }
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = $watch->image;
        }

        $watch->update([
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'material_type' => $request->input('material_type'),
            'origin' => $request->input('origin'),
            'strap_color' => $request->input('strap_color'),
            'quantity' => $request->input('quantity'),
            'image' => $imagePath,
            'tag' => $request->input('tag')
        ]);

        return redirect("/products/{$watch->id}")->with('success', 'Watch updated successfully');
    }
}
