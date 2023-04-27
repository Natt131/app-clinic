<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        //  $cities = City::all();
        return view('medtest/administrator/admin');
    }

    public function messageComplain()
    {
        return view('medtest/administrator/message_complaint');
    }

    public function messageComplainChat($id)
    { $article=$id;
       // $article = Article::findOrFail($id);
        return view('medtest/administrator/complain_chat', ['article' => $article]);//,
    }
}
