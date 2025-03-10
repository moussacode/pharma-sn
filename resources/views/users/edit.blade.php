@extends('layouts.app')
@section('title', 'Modifier Utilisateur')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-10 d-flex justify-content-end">
            <a href="{{ route('users') }}" class="btn btn-primary">Retour</a>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card border-0 shadow-lg my-4">
                <div class="card-header bg-primary">
                    <h3 class="text-white">Modifier l'Utilisateur</h3>
                </div>
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label h5">Nom</label>
                                    <input value="{{ old('name', $user->name) }}" 
                                           type="text" 
                                           class="@error('name') is-invalid @enderror form-control" 
                                           name="name"
                                           required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label h5">Prénom</label>
                                    <input value="{{ old('prenom', $user->prenom) }}" 
                                           type="text" 
                                           class="@error('prenom') is-invalid @enderror form-control" 
                                           name="prenom"
                                           required>
                                    @error('prenom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label h5">Adresse</label>
                            <input value="{{ old('adresse', $user->adresse) }}" 
                                   type="text" 
                                   class="@error('adresse') is-invalid @enderror form-control" 
                                   name="adresse">
                            @error('adresse')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label h5">Téléphone</label>
                                    <input value="{{ old('tel', $user->tel) }}" 
                                           type="tel" 
                                           class="@error('tel') is-invalid @enderror form-control" 
                                           name="tel"
                                           required>
                                    @error('tel')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label h5">Profil</label>
                                    <select class="form-select @error('profil') is-invalid @enderror" name="profil">
                                        <option value="Employe" {{ $user->profil == 'Employe' ? 'selected' : '' }}>Employé</option>
                                        <option value="Admin" {{ $user->profil == 'Admin' ? 'selected' : '' }}>Administrateur</option>
                                    </select>
                                    @error('profil')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label h5">Email</label>
                            <input value="{{ old('email', $user->email) }}" 
                                   type="email" 
                                   class="@error('email') is-invalid @enderror form-control" 
                                   name="email"
                                   required>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label h5">Nouveau mot de passe</label>
                                    <input type="password" 
                                           class="@error('password') is-invalid @enderror form-control" 
                                           name="password"
                                           placeholder="Laissez vide pour ne pas modifier">
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label h5">Confirmation</label>
                                    <input type="password" 
                                           class="form-control" 
                                           name="password_confirmation"
                                           placeholder="Confirmez le nouveau mot de passe">
                                </div>
                            </div>
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