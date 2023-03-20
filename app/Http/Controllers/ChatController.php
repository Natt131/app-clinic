<?php

namespace App\Http\Controllers;

use App\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ChatController extends Controller
{
    public function create(Request $request){
        $user = auth()->user();

        $chat = new Chat();
        $chat->doctor_id = $request->user_id;
        $chat->user_id = $user->id;
        $chat->message = $request->message;
        $chat->save();

        $user = auth()->user();
        header("Location: chats?user_id=$request->user_id");
        die();
    }

    public function list(Request $request){
        //проверка на существование врача
        $user = auth()->user();
        //$chats=Chat::where('user_id', '=', $user->id)->where('doctor_id', '=', $request->doctor_id)->get();

        $chats=Chat::where(function ($query) use ($user,$request) {
            $query->where('user_id', '=', $user->id)
                ->where('doctor_id', '=', $request->user_id);
        })->orWhere(function ($query) use ($user,$request) {
            $query->where('doctor_id', '=', $user->id)
                ->where('user_id', '=', $request->user_id);
        })->get();

        return view('chats', ['chats'=>$chats]);
    }
}
