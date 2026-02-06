<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

use function Laravel\Prompts\alert;

class LoginController extends Controller
{
    //

    public function showRegisterForm()
    {
        return view('loginForm');
    }

    public function hello()
    {
        return "hello ";
    }


    public function register(Request $request)
    {
        // return response()->json(["name" => $request->name, "email" => $request->email, "role" => $request->role, "password" => $request->password]);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'role' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
            'status' => 'required|string'
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'status' => $request->status,
            'password' => Hash::make($request->password)
        ]);


        return redirect('/home')->with('Success', '>>> User registred successfully <<<');
    }

    public function getLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // return response()->json(["email" => $request->email, "password" => $request->password]);
        if (FacadesAuth::attempt(["email" => $request->email, "password" => $request->password])) {

            FacadesAuth::user();
            if (FacadesAuth::check()) {


                alert('Succés!', 'Bienvenue!');
                return redirect('/home');
            } else {
                return redirect()->back()->with('Failed to connect');
            }
        }
    }

    public function logout(Request $request)
    {
        FacadesAuth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
