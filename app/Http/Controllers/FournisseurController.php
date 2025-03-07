<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fournisseurs = Fournisseur:: orderBy('created_at', 'desc')->paginate(1);
        return view('fournisseurs.listes',['fournisseurs' => $fournisseurs]);
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fournisseurs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'laboratoire' => 'required',
            'description_lab' => 'required',
            'telephone' => 'required',
  
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('fournisseurs.create')
                ->withInput()
                ->withErrors($validator);
                
        }
        $fournisseur = new Fournisseur();
        $fournisseur->laboratoire = $request->laboratoire;
        $fournisseur->description_lab = $request->description_lab;
        $fournisseur->telephone = $request->telephone;
        $fournisseur->save();
       
        return redirect()->route('fournisseurs') ->with('success', 'Fournisseur ajoutée avec succès');
  
    }

    /**
     * Display the specified resource.
     */
    public function show(Fournisseur $fournisseur)
    {
        //
    }

    public function search(Request $request){
        if (!empty($request)) {
            $search = $request->input('search');

            $fournisseurs = Fournisseur::where(
                'laboratoire',
                'like',

                "$search%"
            )
            ->orWhere('telephone', 'like', "$search%")
            ->orWhere('description_lab', 'like', "$search%")
            

                ->paginate(2);

            return view('fournisseurs.listes', compact('fournisseurs'));
        }
        
        $products = DB::table('fournisseurs')
        ->orderBy('id', 'DESC')
        ->paginate(5);
        return view('fournisseurs.listes', compact('fournisseurs'));
     }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fournisseur $fournisseur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fournisseur $fournisseur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fournisseur $fournisseur)
    {
        //
    }
}
