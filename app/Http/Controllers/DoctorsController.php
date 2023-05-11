<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\doctors;
use App\Models\DoctorVerify;
use App\Models\Speciality;
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
        $grades1=DB::table('grades')->where('id_doctor','=', $doctor->id_user)
            ->avg('grade');
        $grades=DB::table('comments_doc')->where('id_doctor','=', $id)
            ->avg('grade');
      //  dd($grades);
        $doctor->grade=(int)$grades;
        $doctor->a="jdjd";
        //dd($doctor->grade);
        $comments=DB::table('comments_doc')
            ->join('users', 'users.id', '=', 'id_user')
            ->select('comments_doc.*','users.name')
            ->where('comments_doc.id_doctor', $doctor->id)
            ->get();
        $doctor->comments=$comments;
      //  dd($doctor->comments);
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
            $doctor->grade=$grades;
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
            $doctor->grade=$grades;
            return view('medtest/doc_profile', ['doctor' => $doctor],['articles' => $articles] );
        }
    }

    public function list()
    {
        $specialities=Speciality::all();
        $doctors = doctors::all();
        return view('medtest/about', ['doctors' => $doctors],['specialies'=>$specialities]);
    }

    public function doctors_by_spec($category)
    {
        $id_category = DB::table('specialities')->where('name', '=',$category)->first('name');
      //  dd($id_category);

        if($id_category){
            $specialities=Speciality::all();
            $doctors=DB::table('doctors')->where('id_speciality', '=', $id_category->name)->get();

            return view('medtest/about', ['doctors' => $doctors],['specialies'=>$specialities]);
        }
        return false;
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
        return redirect()->back()->with('message', "Запрос на подтверждение профиля отправлен");
    }

    public function storeGrade($id, $grade)
    {
        //chek own user
        //dd("what    drff");
        //check if exists
        $check=DB::table('grades')
            ->where('id_user','=', auth()->user()->id)
            ->where('id_doctor','=', $id)
            ->get();
        if($check==null) {
            DB::table('grades')->insert([
                'id_user' => auth()->user()->id,
                'id_doctor' => $id,
                'grade' => $grade,
            ]);

            return redirect()->back()->with('message', "Спасибо за оценку!");
        }
        else return redirect()->back()->with('message', " Оценка уже учьена, спасибо!");
    }
    public function storeComment(Request $request)
    {
        //check if exists
        $check=DB::table('grades')
            ->where('id_user','=', auth()->user()->id)
            ->where('id_doctor','=', $request->id_doc)
            ->get();
        if($check==null)
        {
            DB::table('grades')->insert([
                'id_user' => auth()->user()->id,
                'id_doctor' => $request->id_doc,
                'grade' => $request->rating,
            ]);
        }
        DB::table('comments_doc')->insert([
            'id_user' => auth()->user()->id,
            'id_doctor' => $request->id_doc,
            'text' => $request->text,
            'grade' =>$request->rating,
        ]);
       // dd("ddd");
        return redirect()->back()->with('message', "Спасибо за отзыв!!");
    }

}
