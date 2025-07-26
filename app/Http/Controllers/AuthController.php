<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login () {
        return view('auth.login');
    }

    public function loginValidate(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){   
            $request->session()->regenerate();
        
            return redirect()->intended('/');
        }

        return back()->withErrors(['message'=> 'Credenciais invalidas.'])->withInput();
    }

    public function register(){
        return view('auth.register');
    }

    public function saveRegister(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|min:2',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']) 
        ]);

        Auth::login($user);

        return redirect()->intended('/');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}              
