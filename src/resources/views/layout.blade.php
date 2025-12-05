<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo Streaming</title>
    <link rel="stylesheet" href="{{ asset('layout.css') }}">
</head>

<body>
    <header>
        <h1>MediaRoll</h1>
        <nav>
    <ul>
        <li><a href="{{ route('media.index') }}">Media</a></li>
        <li><a href="{{ route('genres.index') }}">Géneros</a></li>
        <li><a href="{{ route('directors.index') }}">Directores</a></li>

    </ul>

    <!-- Spacer empuja el usuario a la derecha -->
    <div class="spacer"></div>

    <a id="nombreUsuario" href="{{ route('profiles.index') }}" class="user-link">
        {{ $Usuario->nombre ?? 'Usuario' }}
    </a>
</nav>

        <hr>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <hr>
        <p>Proyecto CRUD Laravel</p>
    </footer>
</body>
</html>