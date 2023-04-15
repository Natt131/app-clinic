<?php

namespace App\Http\Controllers;

use App\Models\doctors;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;

class DoctorsController extends Controller
{
    public function doctor($id)
    {
        $doctor = doctors::findOrFail($id);
        $infodoc=DB::table('info_docs')->where('id_doc', $doctor->id)->first();
        if($infodoc== null)
        {
            $doctor->education="нет сведений";
            $doctor->certificate="нет сведений";
            $doctor->spec="нет сведений";
        }
        else {
            $doctor->education = $infodoc->education;
            $doctor->certificate = $infodoc->certificate;
            $doctor->spec = $infodoc->spec;
        }
        return view('medtest/doc_profile', ['doctor' => $doctor]);//, ['posts'=>$posts]
    }

    public function list()
    {
        $doctors = doctors::all();
        return view('medtest/about', ['doctors' => $doctors]);
    }
}
