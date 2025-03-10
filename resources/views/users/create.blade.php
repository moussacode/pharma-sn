@extends('layouts.app')
@section('title', 'Créer Utilisateur')
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
                    <h4 class="text-white">Créer un Utilisateur</h4>
                </div>
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <!-- Nom -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label h5">Nom</label>
                                    <input value="{{ old('name') }}" 
                                           type="text" 
                                           class="@error('name') is-invalid @enderror form-control" 
                                           name="name"
                                           required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Prénom -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label h5">Prénom</label>
                                    <input value="{{ old('prenom') }}" 
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

                        <!-- Adresse -->
                        <div class="mb-3">
                            <label class="form-label h5">Adresse</label>
                            <input value="{{ old('adresse') }}" 
                                   type="text" 
                                   class="@error('adresse') is-invalid @enderror form-control" 
                                   name="adresse">
                            @error('adresse')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <!-- Téléphone -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label h5">Téléphone</label>
                                    <input value="{{ old('tel') }}" 
                                           type="tel" 
                                           class="@error('tel') is-invalid @enderror form-control" 
                                           name="tel"
                                           required>
                                    @error('tel')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Profil -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label h5">Profil</label>
                                    <select class="form-select @error('profil') is-invalid @enderror" name="profil">
                                        <option value="" disabled selected>Choisir un profil</option>
                                        <option value="Admin" {{ old('profil') == 'Admin' ? 'selected' : '' }}>Administrateur</option>
                                        <option value="Employe" {{ old('profil') == 'Employe' ? 'selected' : '' }}>Employé</option>
                                    </select>
                                    @error('profil')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label h5">Email</label>
                            <input value="{{ old('email') }}" 
                                   type="email" 
                                   class="@error('email') is-invalid @enderror form-control" 
                                   name="email"
                                   required>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <!-- Mot de passe -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label h5">Mot de passe</label>
                                    <input type="password" 
                                           class="@error('password') is-invalid @enderror form-control" 
                                           name="password"
                                           required>
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Confirmation -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label h5">Confirmation</label>
                                    <input type="password" 
                                           class="form-control" 
                                           name="password_confirmation"
                                           required>
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