<?php

namespace App\Http\Controllers;

use App\Models\doctors;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    public function doctor($id)
    { //$id
        $doctor = doctors::findOrFail($id);

        return view('medtest/doc_profile', ['doctor' => $doctor]);//, ['posts'=>$posts]
    }
    public function list()
    {
        $doctors = doctors::all();
        return view('medtest/about', ['doctors' => $doctors]);
    }

//    public function updateDate(Request $request){
//        $user = auth()->user();
//        $doctor=Category::query()->where('email', '=', $user->email)->get();
//
//        $user->email = $request->email;
//        $doctor->email = $request->email;
//        $doctor->description = $request->description;
//        $doctor->image = 'products\\'.$filename;
//        $doctor->id_user = $user->id;
//        $doctor->save();
//       // $posts = Article::all();
//        return view('services', ['posts' => $posts]);
//    }
}
