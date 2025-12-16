@extends('layout')

@section('content')
<style>
    main {
        margin-left: 10px;
    }

    .home-section {
        max-width: 900px;
    }

    .features {
        margin-left: 25px;
    }

    .features li {
        margin-bottom: 8px;
    }

    .features i {
        margin-right: 8px;
        color: #dc3545; /* rojo StreamRoll */
    }

    .modules {
        margin-top: 20px;
    }

    .module {
        margin-bottom: 15px;
    }

    .module i {
        margin-right: 6px;
        color: #0d6efd;
    }
</style>

<div class="home-section">
    <h2><i class="fas fa-play-circle"></i> Bienvenido a StreamRoll</h2>

    <p>
        <strong>StreamRoll</strong> es una plataforma de streaming orientada a la gestión y visualización
        de contenido audiovisual, desarrollada con <strong>Laravel</strong> siguiendo una arquitectura
        clara, escalable y basada en relaciones entre entidades.
    </p>

    <p>
        La aplicación permite centralizar un catálogo multimedia y navegar por él de forma estructurada,
        ofreciendo una experiencia similar a plataformas comerciales de streaming.
    </p>

    <h4>Contenido disponible</h4>
    <ul class="features">
        <li><i class="fas fa-film"></i> Películas</li>
        <li><i class="fas fa-tv"></i> Series</li>
        <li><i class="fas fa-book-open"></i> Documentales</li>
    </ul>

    <h4>Estructura de la plataforma</h4>
    <div class="modules">
        <div class="module">
            <i class="fas fa-photo-video"></i>
            <strong>Media:</strong> módulo principal donde se gestiona todo el contenido audiovisual.
            Incluye información detallada como formato, estreno, director y géneros asociados.
        </div>

        <div class="module">
            <i class="fas fa-tags"></i>
            <strong>Géneros:</strong> sistema de categorización que permite organizar el contenido
            y facilitar la búsqueda según preferencias del usuario.
        </div>

        <div class="module">
            <i class="fas fa-user-tie"></i>
            <strong>Directores:</strong> sección que agrupa el contenido por autor, mostrando todas
            las obras asociadas a cada director.
        </div>

        <div class="module">
            <i class="fas fa-users-cog"></i>
            <strong>Usuarios:</strong> gestión de usuarios registrados y control de acceso a la plataforma.
        </div>
    </div>

    <p>
        En la parte superior derecha se muestra el acceso al perfil del usuario autenticado,
        reforzando la personalización y el control de sesión dentro del sistema.
    </p>

    <p>
        StreamRoll está pensada para evolucionar incorporando funcionalidades avanzadas como
        listas de favoritos, valoraciones o recomendaciones personalizadas.
    </p>
</div>
@endsection
