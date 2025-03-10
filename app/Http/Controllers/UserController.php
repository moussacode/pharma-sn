<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        return view('users.listes', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:users',
            'tel' => 'required',
            'profil' => 'required',
            'password' => 'required|min:6'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('users.create')
                ->withInput()
                ->withErrors($validator);
        }

        User::create($request->all());

        return redirect()->route('users')
            ->with('success', 'Utilisateur ajouté avec succès');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $rules = [
            'name' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'tel' => 'required',
            'profil' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('users.edit', $user->id)
                ->withInput()
                ->withErrors($validator);
        }

        $user->update($request->except('password'));

        if($request->password) {
            $user->update(['password' => bcrypt($request->password)]);
        }

        return redirect()->route('users')
            ->with('success', 'Utilisateur modifié avec succès');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users')
            ->with('success', 'Utilisateur supprimé avec succès');
    }
}