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
        <li><a href="{{ route('users.index') }}">Usuarios</a></li>

    </ul>

    <!-- Spacer empuja el usuario a la derecha -->
    <div class="spacer"></div>

   @php
$perfil = $Usuario->profile; // null si no tiene perfil
@endphp

@if($perfil)
    <a href="{{ route('profiles.show', $perfil->id) }}">{{ $Usuario->name }}</a>
@else
    <span>{{ $Usuario->name ?? 'Usuario' }}</span>
@endif






</nav>

        <hr>
    </header>

    <main>
        @if(session('success'))
    <div style="color:green">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div style="color:red">{{ session('error') }}</div>
@endif

        @yield('content')
    </main>

    <footer>
        <hr>
        <p>Proyecto CRUD Laravel</p>
    </footer>
</body>
</html>