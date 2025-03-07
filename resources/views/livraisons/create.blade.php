@extends('layouts.app')
@section('title', 'Ajouter Livraison')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-10 d-flex justify-content-end">
            <a href="{{ route('livraisons') }}" class="btn btn-primary">Retour</a>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card border-0 shadow-lg my-4">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Nouvelle Livraison</h4>
                </div>
                <form action="{{ route('livraisons.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <!-- Date de livraison -->
                        <div class="mb-3">
                            <label class="form-label h5">Date</label>
                            <input type="date" 
                                   class="@error('date') is-invalid @enderror form-control"
                                   name="date"
                                   value="{{ old('date') }}">
                            @error('date')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Fournisseur -->
                        <div class="mb-3">
                            <label class="form-label h5">Fournisseur</label>
                            <select class="form-select @error('fournisseur_id') is-invalid @enderror" 
                                    name="fournisseur_id">
                                <option value="">Sélectionner un fournisseur</option>
                                @foreach($fournisseurs as $fournisseur)
                                <option value="{{ $fournisseur->id }}" 
                                    {{ old('fournisseur_id') == $fournisseur->id ? 'selected' : '' }}>
                                    {{ $fournisseur->laboratoire }}
                                </option>
                                @endforeach
                            </select>
                            @error('fournisseur_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Produit et quantité -->
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label h5">Produit</label>
                                    <select class="form-select @error('produit_id') is-invalid @enderror" 
                                            name="produit_id">
                                        <option value="">Sélectionner un produit</option>
                                        @foreach($produits as $produit)
                                        <option value="{{ $produit->id }}" 
                                            {{ old('produit_id') == $produit->id ? 'selected' : '' }}>
                                            {{ $produit->libele }} (Stock: {{ $produit->stock }})
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('produit_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label h5">Quantité</label>
                                    <input type="number" 
                                           min="1" 
                                           class="@error('quant') is-invalid @enderror form-control"
                                           name="quant"
                                           value="{{ old('quant') }}">
                                    @error('quant')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-lg btn-primary">Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection