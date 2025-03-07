@extends('layouts.app')
@section('title', 'Modifier Produit')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-10 d-flex justify-content-end">
            <a href="{{ route('produits') }}" class="btn btn-primary">Retour</a>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card border-0 shadow-lg my-4">
                <div class="card-header bg-primary">
                    <h3 class="text-white">Modifier le Produit</h3>
                </div>
                <form action="{{ route('produits.update', $produit->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label h5">Nom du produit</label>
                            <input value="{{ old('libele', $produit->libele) }}" 
                                   type="text" 
                                   class="@error('libele') is-invalid @enderror form-control" 
                                   placeholder="Nom du médicament" 
                                   name="libele">
                            @error('libele')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label h5">Prix unitaire</label>
                                    <input value="{{ old('prixunitaire', $produit->prixunitaire) }}" 
                                           type="number" 
                                           step="0.01" 
                                           class="@error('prixunitaire') is-invalid @enderror form-control" 
                                           placeholder="Prix unitaire" 
                                           name="prixunitaire">
                                    @error('prixunitaire')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label h5">Stock</label>
                                    <input value="{{ old('stock', $produit->stock) }}" 
                                           type="number" 
                                           class="@error('stock') is-invalid @enderror form-control" 
                                           placeholder="Quantité en stock" 
                                           name="stock">
                                    @error('stock')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label h5">Catégorie</label>
                            <select class="form-select @error('categorie_id') is-invalid @enderror" 
                                    name="categorie_id">
                                <option value="">Sélectionner une catégorie</option>
                                @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}" 
                                        {{ old('categorie_id', $produit->categorie_id) == $categorie->id ? 'selected' : '' }}>
                                        {{ $categorie->libele_categorie }}
                                    </option>
                                @endforeach
                            </select>
                            @error('categorie_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-lg btn-primary">Mettre à jour</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection