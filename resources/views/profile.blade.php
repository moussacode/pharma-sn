@extends('layouts.app')
@section('title', 'Profil Admin')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
               

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                        @method('PUT')

                        <!-- Nom -->
                        <div class="mb-3">
                            <label class="form-label">Nom complet</label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   name="name"
                                   value="{{ old('name', auth()->user()->name) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Adresse email</label>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   name="email"
                                   value="{{ old('email', auth()->user()->email) }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Mot de passe -->
                        <div class="mb-3">
                            <label class="form-label">Nouveau mot de passe</label>
                            <input type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   name="password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirmation mot de passe -->
                        <div class="mb-4">
                            <label class="form-label">Confirmer le mot de passe</label>
                            <input type="password" 
                                   class="form-control" 
                                   name="password_confirmation">
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Enregistrer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection