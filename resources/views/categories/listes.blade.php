@extends('layouts.app')
@section('title', 'Categorie')
@section('content')

<div class="container">
        <div class="row  justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
            <form method="GET" action="categories/search">
                    <div class="input-group" style="margin-right:5px;">
                        <div class="form-outline" data-mdb-input-init>
                            <input class="form-control" name="search" placeholder="Searh..." value="{{ request()->input('search') ? request()->input('search') : '' }}">
                        </div>
                        <button type="submit" class="btn btn-success">Search</button>
                    </div>
                </form>
               
                <a href="{{ route('categories.create') }}" class="btn btn-primary">Ajouter</a>
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
                        <h4 class="text-white">Liste des categories</h4>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th></th>
                                <th>Libele Categorie</th>
                                
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            @if ($categories->isNotEmpty())
                            @foreach ($categories as $categorie)
                            <tr>
                                <td>{{ $categorie->id }}</td>
                                <td></td>
                                
                                <td>{{ $categorie->libele_categorie }}</td>
                               
                                <td>{{ \Carbon\Carbon::parse($categorie->created_at)->format('d M, Y') }}</td>
                                <td>
                                    <a href="{{ route('categories.edit', $categorie->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="#" onclick="deleteCategorie({{ $categorie->id  }});" class="btn btn-danger">Delete</a>
                                    <form id="delete-categorie-from-{{ $categorie->id  }}" action="{{ route('categories.destroy',$categorie->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                            @endif

                        </table>
                        {!! $categories->withQueryString()->links('pagination::bootstrap-5') !!}
</div>
<script>
        function deleteCategorie(id) {
            if (confirm("Are you sure you want to delete categorie ?")) {
                document.getElementById("delete-categorie-from-" + id).submit();
            }
        }
    </script>
@endsection