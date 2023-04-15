<?php

namespace App\Http\Controllers;

use App\Models\doctors;
use App\Models\user;
use App\Models\city;
use App\Models\clinic;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Storage;

class ProfileDoctorController extends Controller
{
    public function list()
    {
        $cities = City::all();
        return view('medtest/edit_profile', compact('cities'));
    }

    function getClinic(Request $request)
    {
        $select = $request->select;
        $dependent = $request->get('dependent');
        $data = DB::table('clinics')
            ->where('id_city', '=', $select)
            ->get();
        //    $data1= Clinic::query()->where('id_city', '=',$select)->get();
        return json_encode($data);
    }

    public function updateData(Request $request)
    {
        $user = auth()->user();

        $doctor=DB::table('doctors')->where('email', $user->email)->first();

//
//        $doctor=DB::table('doctors')->where('id_user', $user->id)->first();
////dd($doctor);
//        if(DB::table('info_docs')->where('id_doc', $doctor->id)->get()==null){
//        }
        if(!DB::table('info_docs')->where('id_doc', $doctor->id)->first()){
            DB::table('info_docs')
                ->insert([
                    ['id_doc' => $doctor->id],
                ]);
        }
       // dd($request->education, $request->certificate, $request->spec);
        $filename = null;

        if ($request->isMethod('post') && $request->file('file')) {
            $request->validate([
                'file' => 'image',
                'file' => 'mimetypes:image/jpeg,image/png',
            ]);
            $file = $request->file('file');
            $upload_folder = 'public/avatars';//'public/products';
            $filename = $file->getClientOriginalName(); // image.jpg

            Storage::putFileAs($upload_folder, $file, $filename);
            $path = Storage::path($filename);
        }

        if ($request->file('file')!=null){
            DB::table('doctors')
                ->where('email', '=', $user->email)
                ->update(['avatar' => 'avatars\\' . $filename]);

            DB::table('users')
                ->where('id', '=', $user->id)
                ->update(['avatar' => 'avatars\\' . $filename]);
        }

        if($request->id_city!=null){
            DB::table('doctors')
                ->where('email', '=', $user->email)
                ->update(['id_city' => $request->id_city,
                        'id_clinic' => $request->clinic,
                ]);
        }

        if($request->email!=null){
            DB::table('doctors')
                ->where('email', '=', $user->email)
                ->update(['email' => $request->email]
                );

                DB::table('users')
                ->where('id', '=', $user->id)
                ->update(//['email' => $request->email],
                    ['avatar' => 'avatars\\' . $filename],
                );

        }

        if($request->education!=null){
            DB::table('info_docs')
                ->where('id_doc', '=', $doctor->id)
                ->update(['education' => $request->education]
                );
        }

        if($request->certificate!=null){
            DB::table('info_docs')
                ->where('id_doc', '=', $doctor->id)
                ->update(['certificate' => $request->certificate]
                );
        }

        if($request->certificate!=null){
            DB::table('info_docs')
                ->where('id_doc', '=', $doctor->id)
                ->update(['certificate' => $request->certificate]
                );
        }

        if($request->certificate!=null){
            DB::table('info_docs')
                ->where('id_doc', '=', $doctor->id)
                ->update(['certificate' => $request->certificate]
                );
        }

        if($request->spec!=null){
            DB::table('info_docs')
                ->where('id_doc', '=', $doctor->id)
                ->update(['spec' => $request->spec]
                );
        }

//        $doctor->save();
//        $user->save();

        return redirect(RouteServiceProvider::HOME);
    }
}
