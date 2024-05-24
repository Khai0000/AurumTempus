<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Watch;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(Request $request,$id){
        $request->validate([
            'author' => 'required|string',
            'title' => 'required|string',
            'rating' => 'required|integer',
            'body' => 'required|string',
            'user_id' => 'required|exists:users,id'
        ]);

        $watch = Watch::findOrFail($id);

        $watch->comments()->create([
            'author' => $request->input('author'),
            'comment_title' => $request->input('title'),
            'comment_star_rating' => $request->input('rating'),
            'comment_body' => $request->input('body'),
            'user_id' => $request->input('user_id'),
        ]); 

        return redirect("/products/{$watch->id}");
    }

    public function destroy($watchId,$commentId){

        $comment = Comment::where('watch_id',$watchId)->find($commentId);

        if(auth()->user()->role=='admin'||auth()->user()->id==$comment->user_id)
        {
            $comment->delete();
        }

        return redirect("/products/$watchId");
    }
}
