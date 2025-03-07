@extends('layouts.app')
@section('title', 'Livraisons')
@section('content')
<div class="container">
    <div class="col-md-10 mb-4 d-flex justify-content-end">
        <form method="GET" action="{{ route('livraisons.search') }}">
            <div class="input-group" style="margin-right:5px;">
                <input class="form-control" 
                       name="search" 
                       placeholder="Rechercher..." 
                       value="{{ request()->input('search') ?? '' }}">
                <button type="submit" class="btn btn-success">Rechercher</button>
            </div>
        </form>
        <a href="{{ route('livraisons.create') }}" class="btn btn-primary">Ajouter</a>
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
            <h4 class="mb-0">Historique des Livraisons</h4>
        </div>
        
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Fournisseur</th>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($livraisons as $livraison)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($livraison->date)->format('d/m/Y') }}</td>
                        <td>{{ $livraison->fournisseur->laboratoire }}</td>
                        <td>{{ $livraison->produit->libele }}</td>
                        <td>{{ $livraison->quant }}</td>
                        <td>
                            <a href="{{ route('livraisons.edit', $livraison->id) }}" 
                               class="btn btn-primary">Modifier</a>
                            <button onclick="deleteLivraison({{ $livraison->id }})" 
                                    class="btn btn-danger">Supprimer</button>
                            <form id="delete-livraison-form-{{ $livraison->id }}" 
                                  action="{{ route('livraisons.destroy', $livraison->id) }}" 
                                  method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            {!! $livraisons->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
</div>

<script>
function deleteLivraison(id) {
    if (confirm("Confirmer la suppression de cette livraison ?")) {
        document.getElementById(`delete-livraison-form-${id}`).submit();
    }
}
</script>
@endsection