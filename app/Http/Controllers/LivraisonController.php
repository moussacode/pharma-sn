<?php

namespace App\Http\Controllers;

use App\Models\Livraison;
use App\Models\Fournisseur;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LivraisonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livraisons = Livraison::with(['fournisseur', 'produit'])->paginate(10);
        return view('livraisons.listes', compact('livraisons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fournisseurs = Fournisseur::all();
        $produits = Produit::all();
        return view('livraisons.create', compact('fournisseurs', 'produits'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fournisseur_id' => 'required|exists:fournisseurs,id',
            'produit_id' => 'required|exists:produits,id',
            'date' => 'required|date',
            'quant' => 'required|integer|min:1'
        ]);

        // Création de la livraison
        $livraison = Livraison::create($validated);

        // Mise à jour du stock
        $produit = Produit::find($validated['produit_id']);
        $produit->stock += $validated['quant'];
        $produit->save();

        return redirect()->route('livraisons')
            ->with('success', 'Livraison enregistrée avec succès');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $livraison = Livraison::findOrFail($id);
        $fournisseurs = Fournisseur::all();
        $produits = Produit::all();
        return view('livraisons.edit', compact('livraison', 'fournisseurs', 'produits'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $livraison = Livraison::findOrFail($id);
        $ancienne_quantite = $livraison->quant;

        $rules = [
            'fournisseur_id' => 'required|exists:fournisseurs,id',
            'produit_id' => 'required|exists:produits,id',
            'date' => 'required|date',
            'quant' => 'required|integer|min:1'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('livraisons.edit', $livraison->id)
                            ->withInput()
                            ->withErrors($validator);
        }

        // Mise à jour du stock
        $difference = $request->quant - $ancienne_quantite;
        $produit = Produit::find($request->produit_id);
        $produit->stock += $difference;
        $produit->save();

        $livraison->update($request->all());

        return redirect()->route('livraisons')
                        ->with('success', 'Livraison mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $livraison = Livraison::findOrFail($id);
        
        // Réduction du stock
        $produit = Produit::find($livraison->produit_id);
        $produit->stock -= $livraison->quant;
        $produit->save();

        $livraison->delete();

        return redirect()->route('livraisons')
                        ->with('success', 'Livraison supprimée avec succès');
    }

    /**
     * Search livraisons
     */
    public function search(Request $request)
    {
        if ($request->has('search')) {
            $search = $request->input('search');
            
            $livraisons = Livraison::whereHas('fournisseur', function($query) use ($search) {
                                    $query->where('laboratoire', 'like', "%$search%");
                                })
                                ->orWhereHas('produit', function($query) use ($search) {
                                    $query->where('libele', 'like', "%$search%");
                                })
                                ->paginate(10);
        } else {
            $livraisons = Livraison::paginate(10);
        }

        return view('livraisons.listes', compact('livraisons'));
    }
}