<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }
    public function login()
    {
        return view('auth/login');
    }
    public function registerSave(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',

            'prenom' => 'required',
            'adresse' => 'required',
            'tel' => 'required',
            'profil' => 'required',
            'email' => 'required|email',
            'password' => 'required | confirmed',
        ])->validate();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'prenom' => $request->prenom,
            'adresse' => $request->adresse,
            'tel' => $request->tel,
            'profil' => $request->profil,

            'password' => Hash::make($request->password),

        ]);
        return redirect()->route('login');
    }
    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ])->validate();

        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => 'Invalid email or password'
            ]);
        }

        $request->session()->regenerate();


        return redirect()->route('dashboard');
    }
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect()->route('login');
    }
    public function profile()
    {
        return view('profile');
    }
}
