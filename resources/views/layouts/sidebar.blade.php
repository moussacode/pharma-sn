<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Logo Pharmacie -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-clinic-medical"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Pharma SN</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Tableau de Bord -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tableau de Bord</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Gestion de Stock -->
    <div class="sidebar-heading">
        Gestion de Stock
    </div>

    <!-- Médicaments -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('produits') }}">
            <i class="fas fa-fw fa-pills"></i>
            <span>Produit</span>
        </a>
    </li>

    <!-- Catégories -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('categories') }}">
            <i class="fas fa-fw fa-tags"></i>
            <span>Catégories</span>
        </a>
    </li>

    <!-- Fournisseurs -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('fournisseurs') }}">
            <i class="fas fa-fw fa-truck"></i>
            <span>Fournisseurs</span>
        </a>
    </li>

    <!-- Livraisons -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('livraisons') }}">
            <i class="fas fa-fw fa-box-open"></i>
            <span>Livraisons</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Administration -->
    <div class="sidebar-heading">
        Administration
    </div>

    <!-- Utilisateurs -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" 
           aria-expanded="true" aria-controls="collapseUsers">
            <i class="fas fa-fw fa-users-cog"></i>
            <span>Utilisateurs</span>
        </a>
        <div id="collapseUsers" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Gestion Utilisateurs:</h6>
                <a class="collapse-item"  href="{{ route('users') }}">Liste des Utilisateurs</a>
                <a class="collapse-item" href="">Créer un Utilisateur</a>
            </div>
        </div>
    </li>

    <!-- Profil -->
    <li class="nav-item">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-user-shield"></i>
            <span>Profil</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>