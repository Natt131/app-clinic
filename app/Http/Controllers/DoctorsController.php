<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\doctors;
use App\Models\DoctorVerify;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DoctorsController extends Controller
{
    public function doctor($id)
    {
        $doctor = doctors::findOrFail($id);
        $infodoc=DB::table('info_docs')->where('id_doc', $doctor->id)->first();
        $articles=DB::table('articles')->where('id_user','=', $doctor->id_user)->orderBy('created_at', 'desc')->get();
       // dd($articles);
        if ($articles==null){
            $articles->name="не опубликовано ни одной статьи";
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
            return view('medtest/doc_profile', ['doctor' => $doctor],['articles' => $articles] );//, ['posts'=>$posts]
        }
        else {
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
            return view('medtest/doc_profile', ['doctor' => $doctor],['articles' => $articles] );
        }
    }

    public function list()
    {
        $doctors = doctors::all();
        return view('medtest/about', ['doctors' => $doctors]);
    }

    public function getVerify()
    {
        return view('medtest/get_verify');
    }

    public function createVerify(Request $request)
    {
        $complain = new DoctorVerify();
        $complain->id_user = $request->id_user;
        $complain->email = $request->email;
        $complain->phone =  $request->phone;
        $complain->message =  $request->message;
        $filename = null;
        if ($request->isMethod('post') && $request->file('file')) {
            $file = $request->file('file');
            $upload_folder = 'public/documents';//'public/products';
            $filename = $file->getClientOriginalName(); // image.jpg
            Storage::putFileAs($upload_folder, $file, $filename);
            //$path = Storage::path($filename);
        }
        $complain->file= 'documents\\' . $filename;

        //$complain->file =  $request->file;
        $complain->save();
        //dd("ok!");
        return redirect()->back()->with('message', "Запрос на подтверждение профиля отправлен");;
    }
}
