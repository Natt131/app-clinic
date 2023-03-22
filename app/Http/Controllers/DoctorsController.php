<?php

namespace App\Http\Controllers;

use App\Models\doctors;
use Illuminate\Http\Request;
use DB;

class DoctorsController extends Controller
{
    public function doctor($id)
    { //$id
        $doctor = doctors::findOrFail($id);
        $infodoc=DB::table('info_docs')->where('id_doc', $doctor->id)->first();
     //  $infodoc=(null) ? return view('medtest/doc_profile', ['doctor' => $doctor]) :  return view('medtest/doc_profile', ['doctor' => $doctor], ['infodoc'=>$infodoc])
       if($infodoc==null)
        return view('medtest/doc_profile', ['doctor' => $doctor]);//, ['posts'=>$posts]
        else
        return view('medtest/doc_profile', ['doctor' => $doctor], ['infodoc'=>$infodoc]);//, ['posts'=>$posts]
    }
    public function list()
    {
        $doctors = doctors::all();
        return view('medtest/about', ['doctors' => $doctors]);
    }
}
