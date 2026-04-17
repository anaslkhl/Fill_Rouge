<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

use function Laravel\Prompts\alert;

class LoginController extends Controller
{
    //

    public function loginShow()
    {
        return view('login');
    }

    public function adminRegistration()
    {
        return view('register');
    }



    public function register(Request $request)
    {


        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'role' => 'required|string',
            'phone' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => 'online',
            'phone' => $request->phone
        ]);


        return redirect('/home')->with('Success', '>>> User registred successfully <<<');
    }


    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role === 'agent') return redirect('/dashboard/agent');
            if ($user->role === 'supervisor') return redirect('/supervisor/dashboard');
            if ($user->role === 'admin') return redirect('/dashboard/admin');

            return redirect('/home');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('home');
    }
}
