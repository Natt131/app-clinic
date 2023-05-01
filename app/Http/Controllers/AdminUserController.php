<?php

namespace App\Http\Controllers;

use App\Models\chatComplain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminUserController extends Controller
{
    public function index()
    {
        //  $cities = City::all();
        return view('medtest/administrator/admin');
    }

    public function messageComplain()
    {
        $chats = DB::table('chat_complains')
            ->join('users', 'chat_complains.id_user', '=', 'users.id')
            ->select('chat_complains.*', 'users.name')
            ->get();

        return view('medtest/administrator/message_complaint', ['chats' => $chats]);//, ['posts'=>$posts]
    }

    public function messageComplainChat($id)
    {
        $user_ind = DB::table('chat_complains')
            ->join('users', 'chat_complains.id_user_indicted', '=', 'users.id')
           // ->join('users', 'chat_complains.id_user', '=', 'users.id')
           // ->join('chats', 'chat_complains.id_user', '=', 'chats.user_id')
            ->select( 'users.*')
            ->where('chat_complains.id','=',$id)
            ->first();

        $user = DB::table('chat_complains')
            ->join('users', 'chat_complains.id_user', '=', 'users.id')
            // ->join('chats', 'chat_complains.id_user', '=', 'chats.user_id')
            ->select( 'users.*')
            ->where('chat_complains.id','=',$id)
            ->first();

        $info=array($user_ind->name,$user->name, $id);
        $chats = DB::table('chat_complains')
            ->join('chats', 'chat_complains.id_user', '=', 'chats.user_id')
            ->select('chat_complains.*', 'chats.*')
            ->where('chat_complains.id','=',$id)
            ->where('chats.doctor_id','=', $user_ind->id)
            ->where('chats.user_id','=', $user->id)
            ->get();

        return view('medtest/administrator/complain_chat', ['chats' => $chats], ['info'=>$info],['user'=>$user_ind]);//,
    }
}
