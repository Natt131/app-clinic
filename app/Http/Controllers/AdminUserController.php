<?php

namespace App\Http\Controllers;

use App\Models\ArticleComplain;
use App\Models\chatComplain;
use App\Models\doctors;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\DB;

class AdminUserController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->role_user=='admin')
        return view('medtest/administrator/admin');
        else return redirect(RouteServiceProvider::HOME);
    }

    public function getVerify($id)
    {
        $doctor = DB::table('doctor_verifies')
            ->join('doctors', 'doctor_verifies.id_user', '=', 'doctors.id_user')
            ->select('doctors.*', 'doctor_verifies.*')
            ->where('doctor_verifies.id','=',$id)
            ->first();
      //  dd($doctor);
        return view('medtest/administrator/verify_doctor',['doctor'=>$doctor]);
    }

    public function verifyUser($id)
    {
        $doctor = DB::table('doctor_verifies')
            ->join('doctors', 'doctor_verifies.id_user', '=', 'doctors.id_user')
            ->select('doctors.*', 'doctor_verifies.*')
            ->where('doctor_verifies.id','=',$id)
            ->first();
      //  dd($doctor);
        return view('medtest/administrator/verify_doctor',['doctor'=>$doctor]);
    }

    public function addVerifyUser($id)
    {
       $oldname= DB::table('users')
            ->where('id','=',$id)
            ->select('users.name')
            ->first();
        $name="✓ ".$oldname->name;
        if (!str_contains($oldname->name, '✓')) {
            DB::table('users')
                ->where('id', '=', $id)
                ->update([
                    'name' => $name,
                ]);
            DB::table('doctors')
                ->where('id_user', '=', $id)
                ->update([
                    'name' => $name,
                ]);

        }
        $doctors = DB::table('doctor_verifies')
            ->join('doctors', 'doctor_verifies.id_user', '=', 'doctors.id_user')
            ->select('doctors.*', 'doctor_verifies.id')
            ->get();
        return view('medtest/administrator/verify_list',['doctors'=>$doctors]);
    }

    public function getVerifyList()
    {
        $doctors = DB::table('doctor_verifies')
            ->join('doctors', 'doctor_verifies.id_user', '=', 'doctors.id_user')
            ->select('doctors.*', 'doctor_verifies.id')
            ->get();
        //dd($doctors);
        return view('medtest/administrator/verify_list', ['doctors' => $doctors]);//, ['posts'=>$posts]
    }
//просмотр всех жалоб из чатов
    public function messageComplain()
    {
        $chats = DB::table('chat_complains')
            ->join('users', 'chat_complains.id_user', '=', 'users.id')
            ->select('chat_complains.*', 'users.name')
            ->get();

        return view('medtest/administrator/message_complaint', ['chats' => $chats]);//, ['posts'=>$posts]
    }
//просомтр всех жалоб на отдельные статьи
    public function articleComplain()
    {
        $chats = DB::table('article_complains')
            ->join('users', 'article_complains.id_user', '=', 'users.id')
            ->select('article_complains.*', 'users.name')
            ->get();

        return view('medtest/administrator/article_complaint', ['chats' => $chats]);//, ['posts'=>$posts]
    }

    //просмотр конкретной жалобы на статью
    public function getArticleComplain($id)
    {
        $user_ind = DB::table('article_complains')
            ->join('users', 'article_complains.id_user_indicted', '=', 'users.id')
            ->select( 'users.*')
            ->where('article_complains.id','=',$id)
            ->first();

        $user = DB::table('article_complains')
            ->join('users', 'article_complains.id_user', '=', 'users.id')
            // ->join('chats', 'chat_complains.id_user', '=', 'chats.user_id')
            ->select( 'users.*')
            ->where('article_complains.id','=',$id)
            ->first();

        $info=array($user_ind->name,$user->name, $id, $user_ind->id);
        $article = DB::table('article_complains')
            ->join('articles', 'article_complains.id_article', '=', 'articles.id')
            ->select('articles.*')
            ->where('article_complains.id','=',$id)
            ->first();
//dd($article);
        return view('medtest/administrator/complain_article', ['article' => $article], ['info'=>$info],['user'=>$user_ind]);//,
    }

    public function deleteArticleComplain($id){
        // $chatComplain = chatComplain::findOrFail($id);
        articleComplain::where('id', $id)->firstOrFail()->delete();
        return redirect('/admin/article_complaint');
    }
//просомтр конкретной жалобы из чата
    public function messageComplainChat($id)
    {
        $user_ind = DB::table('chat_complains')
            ->join('users', 'chat_complains.id_user_indicted', '=', 'users.id')
            ->select( 'users.*')
            ->where('chat_complains.id','=',$id)
            ->first();

        $user = DB::table('chat_complains')
            ->join('users', 'chat_complains.id_user', '=', 'users.id')
            // ->join('chats', 'chat_complains.id_user', '=', 'chats.user_id')
            ->select( 'users.*')
            ->where('chat_complains.id','=',$id)
            ->first();

        $info=array($user_ind->name,$user->name, $id, $user_ind->id);
        $chats = DB::table('chat_complains')
            ->join('chats', 'chat_complains.id_user', '=', 'chats.user_id')
            ->select('chat_complains.*', 'chats.*')
            ->where('chat_complains.id','=',$id)
            ->where('chats.doctor_id','=', $user_ind->id)
            ->where('chats.user_id','=', $user->id)
            ->get();

        return view('medtest/administrator/complain_chat', ['chats' => $chats], ['info'=>$info],['user'=>$user_ind]);//,
    }

    //удаляем пользователя и все что с ним связано
    public function deleteUserComplain($id)
    {
        DB::table('chats')
            ->select('chats.*')
            ->where('chats.doctor_id','=',$id)
            ->delete();
        chatComplain::where('id_user_indicted', $id)->delete();
        chatComplain::where('id_user', $id)->delete();
        ArticleComplain::where('id_user_indicted', $id)->delete();
        DB::table('articles')
            ->select('articles.*')
            ->where('articles.id_user','=',$id)
            ->delete();
      // ArticleComplain::where('id_user', $id)->firstOrFail()->delete();
        User::where('id', $id)->delete();
        Doctors::where('id_user', $id)->delete();

        return redirect('/admin/chat_complaint')->with('message', "Пользователь удален");;
    }
}
