
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Plateforme de ressources')</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">Tableau de bord</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="{{ route('ressources.index') }}" class="nav-link">Ressources</a></li>
                <li class="nav-item"><a href="{{ route('modules.index') }}" class="nav-link">Modules</a></li>
                <li class="nav-item"><a href="{{ route('levels.index') }}" class="nav-link">Niveaux</a></li>
                <li class="nav-item"><a href="{{ route('groups.index') }}" class="nav-link">Groupes</a></li>
                <li class="nav-item"><a href="{{ route('tags.index') }}" class="nav-link">Tags</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
