@extends('layout')

@section('content')
<h2>Géneros</h2>
<a href="{{ route('genres.create') }}">Añadir nuevo género</a>
<br><br>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Obras asociadas</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($genres as $genre)
        <tr>
            <td>{{ $genre->id }}</td>
            <td>{{ $genre->nombre }}</td>
            <td>
                <a href="{{ route('media.porGenero', $genre) }}">
                    {{ $genre->medias->count() }}
                </a>
            </td>

            <td>
                <a href="{{ route('genres.edit', $genre) }}">Editar</a>

                <form action="{{ route('genres.destroy', $genre) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Borrar género?')">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection