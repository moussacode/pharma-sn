@extends('layouts.app')
@section('title', 'Médicaments')
@section('content')
<div class="container">
    <div class="col-md-10 mb-4 d-flex justify-content-end">
            <form method="GET" action="/produits/search">
                    <div class="input-group" style="margin-right:5px;">
                        <div class="form-outline" data-mdb-input-init>
                            <input class="form-control" name="search" placeholder="Searh..." value="{{ request()->input('search') ? request()->input('search') : '' }}">
                        </div>
                        <button type="submit" class="btn btn-success">Search</button>
                    </div>
                </form>
               
                <a href="{{ route('produits.create') }}" class="btn btn-primary">Ajouter</a>
            </div>
            @if (Session::has('success'))
            <div class="col-md-10 mt-4">
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
            @endif
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Gestion des Médicaments</h4>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Stock</th>
                        <th>Catégorie</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produits as $produit)
                    <tr>
                        <td>{{ $produit->libele }}</td>
                        <td>{{ $produit->prixunitaire }} Fcfa</td>
                        <td>{{ $produit->stock }}</td>
                        <td>{{ $produit->categorie->libele_categorie }}</td>
                        <td>
                            <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-primary">Modifier</a>
                            <a href="#" onclick="deleteProduit({{ $produit->id }});" class="btn btn-danger">Delete</a>
<form id="delete-produit-form-{{ $produit->id }}" action="{{ route('produits.destroy', $produit->id) }}" method="post">
    @csrf
    @method('delete')
</form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $produits->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>
<script>
    function deleteProduit(id) {
        if (confirm("Are you sure you want to delete this product?")) {
            document.getElementById("delete-produit-form-" + id).submit();
        }
    }
</script>
@endsection