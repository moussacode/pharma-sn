<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Pharmacie</title>
    <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body p-5">
                        <h2 class="text-center mb-4">Connexion</h2>
                        
                        <form method="POST" action="{{ route('login.action') }}">
                            @csrf
                            
                            <div class="mb-3">
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror"
                                       name="email"
                                       placeholder="Adresse email"
                                       value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <input type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       name="password"
                                       placeholder="Mot de passe">
                                @error('password')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" 
                                       class="form-check-input" 
                                       name="remember"
                                       id="remember">
                                <label class="form-check-label small" for="remember">
                                    Se souvenir de moi
                                </label>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mb-3">
                                Se connecter
                            </button>

                          
                        </form>

                        <hr class="my-4">

                        <div class="text-center small">
                            <span>Pas de compte ? </span>
                            <a href="{{ route('register') }}" class="text-decoration-none">
                                S'inscrire
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>