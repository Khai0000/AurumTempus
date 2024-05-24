<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Watch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartItemController extends Controller
{

    public function add(Request $request)
    {
        $request->validate([
            'watch_id' => 'required|exists:watches,id', 
        ]);
    
        $cartItem = auth()->user()->cartItems()->where('watch_id', $request->watch_id)->first();
    
        if ($cartItem) {
            $cartItem->quantity += 1;
        } else {
            $cartItem = new CartItem([
                'user_id' => auth()->user()->id,
                'watch_id' => $request->watch_id,
                'quantity' => 1,
            ]);
            auth()->user()->cartItems()->save($cartItem);
        }
    
        $cartItem->save();

        return response()->json(['success' => true]);
    }
    
    public function remove(Request $request, $id)
    {
        $cartItem = auth()->user()->cartItems()->find($id);
        
        if ($cartItem) {
            $cartItem->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Cart item not found.']);
        }
    }

    public function removeAll(Request $request)
    {
        DB::table('cart_items')->where('user_id', auth()->user()->id)->delete();

        return response()->json(['success' => true]);
    }

}
