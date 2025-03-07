<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{   
    use HasFactory;
    

    protected $fillable = ['libele', 'prixunitaire', 'stock', 'categorie_id'];

    // Relation avec Catégorie
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    // Relation avec Livraison
    public function livraison()
    {
        return $this->belongsTo(Livraison::class);
    }

}
