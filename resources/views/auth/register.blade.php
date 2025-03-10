<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Pharmacie</title>
    <link href={{asset("admin_assets/vendor/fontawesome-free/css/all.min.css")}} rel="stylesheet" type="text/css">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body p-5">
                        <h2 class="text-center mb-4">Créer un compte</h2>
                        
                        <form method="POST"  action="{{ route('register.save') }}">
    @csrf

                            <div class="mb-3 form-group">
        <input type="text" 
               class="form-control @error('name') is-invalid @enderror"
               name="name"
               placeholder="Nom"
               value="{{ old('name') }}">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Prénom -->
    <div class="mb-3">
        <input type="text" 
               class="form-control @error('prenom') is-invalid @enderror"
               name="prenom"
               placeholder="Prénom"
               value="{{ old('prenom') }}">
        @error('prenom')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Adresse -->
    <div class="mb-3">
        <input type="text" 
               class="form-control @error('adresse') is-invalid @enderror"
               name="adresse"
               placeholder="Adresse"
               value="{{ old('adresse') }}">
        @error('adresse')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Téléphone -->
    <div class="mb-3">
        <input type="tel" 
               class="form-control @error('tel') is-invalid @enderror"
               name="tel"
               placeholder="Téléphone"
               value="{{ old('tel') }}">
        @error('tel')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Profil -->
    <div class="mb-3">
        <select class="form-select @error('profil') is-invalid @enderror" name="profil">
            <option value="" disabled selected>Choisir un profil</option>
            <option value="Admin" {{ old('profil') == 'Admin' ? 'selected' : '' }}>Administrateur</option>
            <option value="Employe" {{ old('profil') == 'Employe' ? 'selected' : '' }}>Employé</option>
        </select>
        @error('profil')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Email -->
    <div class="mb-3">
        <input type="email" 
               class="form-control @error('email') is-invalid @enderror"
               name="email"
               placeholder="Adresse email"
               value="{{ old('email') }}">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Mot de passe -->
    <div class="mb-3">
        <input type="password"
               class="form-control @error('password') is-invalid @enderror"
               name="password"
               placeholder="Mot de passe">
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Confirmation mot de passe -->
    <div class="mb-4">
        <input type="password"
               class="form-control"
               name="password_confirmation"
               placeholder="Confirmer le mot de passe">
    </div>

    <button type="submit" class="btn btn-primary w-100">
        S'inscrire
    </button>
</form>

                        <div class="mt-3 text-center">
                            <a  class="text-decoration-none small" href="{{ route('login') }}">
                                Déjà un compte ? Se connecter
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('admin_assets/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>