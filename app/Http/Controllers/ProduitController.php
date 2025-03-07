<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Produit::with('categorie')->paginate(10);
        return view('produits.listes', compact('produits'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('produits.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'libele' => 'required|string|max:255',
            'prixunitaire' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categorie_id' => 'required|exists:categories,id'
        ]);
    
        Produit::create($validated);
        
        return redirect()->route('produits')
            ->with('success', 'Produit créé avec succès');   }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    public function search(Request $request){
        if (!empty($request)) {
            $search = $request->input('search');

            $produits = Produit::where(
                'libele',
                'like',
                "$search%"
            )
                
                ->paginate(2);

            return view('produits.listes', compact('produits'));
        }
        
        $produits = DB::table('produits')
        ->orderBy('id', 'DESC')
        ->paginate(5);
        return view('produits.listes', compact('produits'));
     }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        
        $categories = Categorie::all();
        $produit = Produit::find($id);
        return view('produits.edit', compact('produit', 'categories'));  

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $produit = Produit::findOrFail($id);
    
        $rules = [
            'libele' => 'required|string|max:255',
            'prixunitaire' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categorie_id' => 'required|exists:categories,id'
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return redirect()->route('produits.edit', $produit->id)
                             ->withInput()
                             ->withErrors($validator);
        }
    
        $produit->update($request->only(['libele', 'prixunitaire', 'stock', 'categorie_id']));
    
        return redirect()->route('produits')
                         ->with('success', 'Produit mis à jour avec succès');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();
    
        return redirect()->route('produits')
                         ->with('success', 'Produit supprimé avec succès'); 
    }
}
