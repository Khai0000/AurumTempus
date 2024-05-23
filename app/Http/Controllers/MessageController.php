<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request){
        try {
            $incomingField = $request->validate([
                'author'=>'required|string',
                'email'=>'required|string',
                'phone'=>'required|string',
                'message'=>'required|string',
            ]);
    
            Message::create($incomingField);
    
            return redirect('/contactUs')->with('success', 'Message sent successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while sending the message. Please try again.');
        }
    }
    
    public function delete($id){
        try {
            $message = Message::findOrFail($id);
            $message->delete();
            return redirect('/contactUs')->with('success', 'Message deleted successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while deleting the message. Please try again.');
        }
    }
}
