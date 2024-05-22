<?php

namespace App\Http\Controllers;

use App\Models\Watch;
use Illuminate\Http\Request;

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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif'
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
            'image' => $imagePath
        ]);

        return redirect('/');    
    }

}
