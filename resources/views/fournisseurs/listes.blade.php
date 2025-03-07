@extends('layouts.app')
@section('title', 'Fournisseurs')
@section('content')

<div class="container">
        <div class="row  justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
            <form method="GET" action="fournisseurs/search">
                    <div class="input-group" style="margin-right:5px;">
                        <div class="form-outline" data-mdb-input-init>
                            <input class="form-control" name="search" placeholder="Searh..." value="{{ request()->input('search') ? request()->input('search') : '' }}">
                        </div>
                        <button type="submit" class="btn btn-success">Search</button>
                    </div>
                </form>
               
                <a href="{{ route('fournisseurs.create') }}" class="btn btn-primary">Ajouter</a>
            </div>
            @if (Session::has('success'))
            <div class="col-md-10 mt-4">
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>
            @endif
            <div class="col-md-10">
                <div class="card borde-0  my-4">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Liste des fournisseurs</h4>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th></th>
                                <th>Laboratoire</th>
                                <th>Description</th>
                                <th>Telephone</th>
                                
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            @if ($fournisseurs->isNotEmpty())
                            @foreach ($fournisseurs as $fournisseur)
                            <tr>
                                <td>{{ $fournisseur->id }}</td>
                                <td></td>
                                
                                <td>{{ $fournisseur-> laboratoire  }}</td>
                                <td>{{ $fournisseur->description_lab }}</td>
                                <td>{{ $fournisseur->telephone }}</td>
                               
                                <td>{{ \Carbon\Carbon::parse($fournisseur->created_at)->format('d M, Y') }}</td>
                                <td>
                                    <a href="{{ route('fournisseurs.edit', $fournisseur->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="#" onclick="deleteFournisseur({{ $fournisseur->id  }});" class="btn btn-danger">Delete</a>
                                    <form id="delete-fournisseurs-from-{{ $fournisseur->id  }}" action="{{ route('fournisseurs.destroy',$fournisseur->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                            @endif

                        </table>
                        {!! $fournisseurs->withQueryString()->links('pagination::bootstrap-5') !!}
</div>
<script>
        function deleteFournisseur(id) {
            if (confirm("Are you sure you want to delete fournisseur ?")) {
                document.getElementById("delete-fournisseur-from-" + id).submit();
            }
        }
    </script>
@endsection