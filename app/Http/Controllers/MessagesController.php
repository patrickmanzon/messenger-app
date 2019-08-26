<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;

class MessagesController extends Controller
{
    public function contacts()
    {
        $contacts = User::where('id' , '!=', auth()->id())->get();

        return response()->json($contacts);

    }

    public function getMessages($id)
    {   
       
        $messages = Message::where(function($q) use($id) {
            $q->where("sender", "=", $id) 
                ->Where("receiver", "=", auth()->id());
        })
        ->orWhere(function ($q) use($id) {
            $q->where("sender", "=", auth()->id())
                ->Where("receiver", "=", $id);
        })->get();



        return response()->json($messages);
    }

    public function sendMessage(Request $request)
    {
        $message = Message::create([
            "message" => $request->message,
            "receiver" => $request->receiver,
            "sender" => auth()->id()
        ]);

        return response()->json($message);
    }
}
