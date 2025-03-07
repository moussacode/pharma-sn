<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie:: orderBy('created_at', 'desc')->paginate(1);
        return view('categories.listes',['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'libele_categorie' => 'required',
            
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('categories.create')
                ->withInput()
                ->withErrors($validator);
                
        }
        $categorie = new Categorie();
        $categorie->libele_categorie = $request->libele_categorie;
        $categorie->save();
       
        return redirect()->route('categories') ->with('success', 'Categorie ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }
    public function search(Request $request){
        if (!empty($request)) {
            $search = $request->input('search');

            $categories = Categorie::where(
                'libele_categorie',
                'like',
                "$search%"
            )
                
                ->paginate(2);

            return view('categories.listes', compact('categories'));
        }
        
        $products = DB::table('categories')
        ->orderBy('id', 'DESC')
        ->paginate(5);
        return view('categories.listes', compact('categories'));
     }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
       $categorie = Categorie::findOrFail($id);
       return view('categories.edit', ['categorie' => $categorie]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        
        $categorie = Categorie::findOrFail($id);
        $rules = [
            'libele_categorie' => 'required',
            
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('categories.edit', $categorie->id)->withInput()->withErrors($validator);
        }

        $categorie->libele_categorie = $request->libele_categorie;
        $categorie->save();
        return redirect()->route('categories') ->with('success', 'Categorie modifiée avec succès');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();
        return redirect()->route('categories') ->with('success', 'Categorie supprimée avec succès');
    }
}
