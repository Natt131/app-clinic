<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        $doctors=Doctor::all();
        $doctors=DB::table('doctors')
            ->select('doctors.*')
            ->limit(4)
            ->get();
       // $doctors=User::where('role_user', '=', 'doctor')->get();//$doctors=User::where('role', '=', 'doctor')->get();
        return view('medtest/index', ['doctors'=>$doctors]);//
    }
}
