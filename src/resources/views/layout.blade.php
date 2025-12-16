<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediaRoll - @yield('title', 'Catálogo')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        :root {
            --bg: #f4f4f4;
            --text: #333;
            --header: #1f2937;
            --header-hover: #374151;
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --card: #ffffff;
            --border: #ccc;
            --th: #e5e7eb;
            --row-hover: #f9fafb;
            --brand: #dc2626; /* ROJO MediaRoll */
        }

        body.dark {
            --bg: #0f172a;
            --text: #e5e7eb;
            --header: #020617;
            --header-hover: #1e293b;
            --primary: #3b82f6;
            --primary-hover: #60a5fa;
            --card: #020617;
            --border: #1e293b;
            --th: #1e293b;
            --row-hover: #020617;
            --brand: #ef4444;
        }

        body {
            background: var(--bg);
            color: var(--text);
            line-height: 1.6;
        }

        header {
            background: var(--header);
            padding: 10px 20px;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        nav h1 {
            font-size: 1.8rem;
            color: var(--brand);
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 15px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
            transition: background .2s;
        }

        nav ul li a:hover {
            background: var(--header-hover);
        }

        .spacer {
            flex: 1;
        }

        .user {
            background: var(--primary);
            color: #fff;
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
            transition: background .2s;
        }

        .user:hover {
            background: var(--primary-hover);
        }

        #themeToggle {
            background: transparent;
            border: 1px solid #fff;
            color: #fff;
            padding: 4px 8px;
            border-radius: 4px;
            cursor: pointer;
        }

        main {
            padding: 20px;
            max-width: 1200px;
            margin: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: var(--card);
        }

        th, td {
            padding: 10px;
            border: 1px solid var(--border);
            text-align: center; /* CONTENIDO CENTRADO */
            vertical-align: middle;
        }

        th {
            background: var(--th);
        }

        tr:hover {
            background: var(--row-hover);
        }

        footer {
            text-align: center;
            padding: 10px 0;
            margin-top: 40px;
            color: #777;
        }
    </style>
</head>

<body>
<header>
    <nav>
        <h1>MediaRoll</h1>

        <ul>
            <li><a href="{{ route('media.index') }}">Media</a></li>
            <li><a href="{{ route('genres.index') }}">Géneros</a></li>
            <li><a href="{{ route('directors.index') }}">Directores</a></li>
            <li><a href="{{ route('users.index') }}">Usuarios</a></li>
        </ul>

        <div class="spacer"></div>

        <button id="themeToggle">🌙</button>

        @php $perfil = $Usuario->profile ?? null; @endphp
        @if($perfil)
            <a href="{{ route('profiles.show', $perfil->id) }}" class="user">
                {{ $Usuario->name }}
            </a>
        @else
            <span class="user">{{ $Usuario->name ?? 'Usuario' }}</span>
        @endif
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer>
    Proyecto CRUD Laravel &copy; {{ date('Y') }}
</footer>

<script>
    const toggle = document.getElementById('themeToggle');

    toggle.addEventListener('click', () => {
        document.body.classList.toggle('dark');
        localStorage.setItem(
            'theme',
            document.body.classList.contains('dark') ? 'dark' : 'light'
        );
    });

    if (
        localStorage.getItem('theme') === 'dark' ||
        (!localStorage.getItem('theme') &&
         window.matchMedia('(prefers-color-scheme: dark)').matches)
    ) {
        document.body.classList.add('dark');
    }
</script>
</body>
</html>
