<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Doctor;
use App\Models\chatComplain;
use App\Models\doctors;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use DB;

class ChatController extends Controller
{
    public function index()
    {
        $users = DB::table('chats')
            ->join('users', 'chats.user_id', '=', 'users.id')
            //->join('doctors', 'doctors.id_user', '=', $request->user_id)
            ->select('users.*')->distinct()//
            ->get();
        return view('medtest/messanger', [ 'users'=>$users]);
    }
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

        $users = DB::table('chats')
            ->join('users', 'chats.user_id', '=', 'users.id')
            //->join('doctors', 'doctors.id_user', '=', $request->user_id)
            ->select('users.name', 'users.lastname', 'users.id')->distinct()//
            ->get();

        $doctor=DB::table('doctors')
          //  ->join('uss', 'chats.user_id', '=', 'users.id')
            // ->join('do', 'users.id', '=', 'orders.user_id')
            ->select('doctors.*')
            ->where('doctors.id_user', '=', $request->user_id)//
            ->get()->first();

//   $doctor1=new Doctor();
//   $doctor1->avatar="avatars/default.jpg";
//   $doctor1->speciality="Пациент";

        if($doctor==null)
        {
            $user = DB::table('users')
                //->join('users', 'chats.doctor_id', '=', 'users.id')
                //->join('doctors', 'doctors.id_user', '=', $request->user_id)
                ->select('users.name', 'users.lastname', 'users.id')->distinct()//
                ->where('users.id','=',$request->user_id)
                ->first();
           // dd($user);
            $doctor1=new Doctor();
            $doctor1->avatar="avatars/default.jpg";
            $doctor1->id_speciality="Пациент";
            $doctor1->name=$user->name;
            $doctor1->family=$user->lastname;
            $doctor=$doctor1;
           // dd($doctor->speciality);
        }
        return view('chats', ['chats'=>$chats, 'doctor'=>$doctor, 'users'=>$users]);
    }

//    public function complain(Request $request) {//
//        $complain = new chatComplain();
//       // dd("ssssjsjsjs");
//        dd($request);
//        $complain->name = $request->name;
//        $complain->id_user = $request->id_user;
//        $complain->id_user_indicted = $request->id_user_indicted;
//        $complain->reason =  $request->reason;
//
//        $complain->save();
//
//        return response()->json(['success'=>'Form is successfully submitted!']);
//
//    }
}
