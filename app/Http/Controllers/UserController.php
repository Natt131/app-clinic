<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function account(){
        return view('medtest/account');
    }
    public function user_info_add(Request $request){
dd($request);
    }
}
