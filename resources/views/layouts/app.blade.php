<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>TechStock - @yield('title', 'Gestion du parc informatique')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <nav class="navbar">
        <a href="{{ route('devices.index') }}" class="navbar-brand">TechStock</a>
        <div class="navbar-links">
            <a href="{{ route('devices.index') }}">Équipements</a>
            <a href="{{ route('rooms.index') }}">Salles</a>
            <a href="{{ route('categories.index') }}">Catégories</a>
        </div>
    </nav>

    <main class="container">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

    </main>

</body>
</html>