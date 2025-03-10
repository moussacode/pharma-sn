<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Fournisseur;
use App\Models\Livraison;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistiques principales
        $data = [
            'totalProduits' => Produit::count(),
            'stockCritique' => Produit::where('stock', '<=', 10)->count(),
            'totalFournisseurs' => Fournisseur::count(),
            'livraisonsMois' => Livraison::whereMonth('date', now()->month)->count(),
        ];

        // Données pour le graphique des stocks
        $stockData = Produit::orderBy('created_at')
            ->get()
            ->groupBy(fn($item) => $item->created_at->format('M Y'))
            ->map(fn($group) => $group->sum('stock'));

        $data['stockLabels'] = $stockData->keys();
        $data['stockData'] = $stockData->values();

        // Répartition par catégorie
        $categorieData = Categorie::withCount('produits')->get();
        $data['categorieLabels'] = $categorieData->pluck('libele_categorie');
        $data['categorieData'] = $categorieData->pluck('produits_count');

        // Dernières livraisons
        $data['recentLivraisons'] = Livraison::with(['fournisseur', 'produit'])
            ->orderBy('date', 'DESC')
            ->take(5)
            ->get();

        return view('dashboard', $data);
    }
}