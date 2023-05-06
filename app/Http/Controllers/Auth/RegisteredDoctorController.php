<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\doctors;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use DB;

class RegisteredDoctorController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth\doctor-register');//auth.register
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->family,
            'email' => $request->email,
            'role_user' => "doctor",
            'password' => Hash::make($request->password),
        ]);

        doctors::create([
            'family' =>  $request->family,
            'name' =>  $request->name, //$data['name']
            'surname' =>  $request->surname,
            'email' => $request->email,
            'birth' => $request->birth,
            'id_city' => $request->id_city,
            'id_clinic' => $request->id_clinic,
            'id_speciality' => $request->id_speciality,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        $user=auth()->user();
        DB::table('doctors')
            ->where('email', '=', $user->email)
            ->update(['id_user' => $user->id]);

        return redirect(RouteServiceProvider::HOME);
    }

}
