<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;
    protected $fillable = [
        'laboratoire',
        'description_lab',
        'telephone',
        
    ];

    public function livraisons()
    {
        return $this->hasMany(Livraison::class);
    }
}
