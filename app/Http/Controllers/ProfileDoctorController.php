<?php

namespace App\Http\Controllers;
use App\Models\doctors;
use App\Models\user;
use App\Models\city;
use App\Models\clinic;
use Illuminate\Http\Request;
use DB;
class ProfileDoctorController extends Controller
{

    public function list(){
        $cities = City::all();

        return view('medtest/edit_profile',compact('cities'));
//        $cities= City::all();
//        $clinics= Clinic::all();
//        return view('medtest/edit_profile', ['cities' => $cities], ['clinics' => $clinics],);
    }


    function getClinic(Request $request)
    {
        $select = $request->select;
        //$value = $request->get('value');
       // dd($request->get('id_city'));
        $dependent = $request->get('dependent');
        $data = DB::table('clinics')
            ->where('id_city','=',$select)
            ->get();
        //$output = '<option value="">Select '.ucfirst($dependent).'</option>';
        header('Content-type: application/json');
        echo json_encode( $data );

        //return $data;
        foreach($data as $row)
        {
          //  $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
            //$output .= '<option value="'.'kkk'.'">'.'jj'.'</option>';
        }
       // echo $output;
    }


//    public function data($id){
//
//        $states = Clinic::query()->where('id_city','=',$id)->get()->pluck("name","id");
//        return response()->json($states);
//
//
//
////        if($request->ajax()){
////            $clinics = Clinic::query()->where('id_city','=',$request->city)->get()->pluck("name","id");
////            $data = view('medtest/edit_profile',['clinics' => $clinics])->render();
////            return response()->json(['options'=>$data]);
////        }
//    }



    public function updateData(Request $request){
      //  return view('medtest/doc_profile');
          //  $city_value = $request->clinics;
        //dd($request);

        $user = auth()->user();
        $clinic=clinic::query()->where('id_city', '=', $request->city)->get();
        foreach ($clinic as $cl)
        {
            echo($cl->name);
        }
        //dd($clinic->name);
//      dd($doctor);
//       // $user->email = $request->email;
//        $doctor->email = $request->email;
//        $doctor->description = $request->description;
//      //  $doctor->image = 'products\\' . $filename;
//        $doctor->id_user = $user->id;
//        $doctor->save();
//        // $posts = Article::all();
       // return view('medtest/doc_profile');
    }


}
