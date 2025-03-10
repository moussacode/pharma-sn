@extends('layouts.app')
@section('title', 'Users')
@section('content')

<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-10 d-flex justify-content-end">
            <a href="{{ route('users.create') }}" class="btn btn-primary">Ajouter</a>
        </div>
        
        @if (Session::has('success'))
        <div class="col-md-10 mt-4">
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        </div>
        @endif
        
        <div class="col-md-10">
            <div class="card border-0 my-4">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Liste des Utilisateurs</h4>
                </div>

                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Profil</th>
                            <th>Actions</th>
                        </tr>
                        
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->prenom }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->profil }}</td>
                            <td>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form class="d-inline" action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" 
                                            onclick="return confirm('Confirmer la suppression ?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection