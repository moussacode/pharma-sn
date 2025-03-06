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
                                       class="form-control @error('name')is-invalid @enderror"
                                       
                                       name="name"
                                       placeholder="Nom complet"
                                       >
                                       @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                      
                                      
                                       
                            </div>

                            <div class="mb-3">
                                <input type="email" 
                                       class="form-control @error('email')is-invalid @enderror"
                                       name="email"
                                       placeholder="Adresse email"
                                       >
                                       @error('email')
                                       <span class="text-danger">{{ $message }}</span>
                                        @enderror
                            </div>

                            <div class="mb-3 form-group">
                                <input type="password"
                                       class="form-control @error('password')is-invalid @enderror"
                                       name="password"
                                       placeholder="Mot de passe"
                                       >
                                       @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                            </div>

                            <div class="mb-4">
                                <input type="password"
                                       class="form-control @error('password_confirmation')is-invalid @enderror"
                                       name="password_confirmation"
                                       placeholder="Confirmer le mot de passe"
                                       >
                                       @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>