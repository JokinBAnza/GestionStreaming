@extends('layout')

@section('content')
<h2>Directores</h2>
<a href="{{ route('directors.create') }}">Añadir nuevo director</a>
<br><br>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Año de Nacimiento</th>
            <th>Obras dirigidas</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($directors as $director)
        <tr>
            <td>{{ $director->id }}</td>
            <td>{{ $director->nombre }}</td>
            <td>{{ $director->anoNacimiento }}</td>
            <td>
                <a href="{{ route('directors.medias', $director) }}">
                    {{ $director->medias->count() }}
                </a>
            </td>

            <td>
                <a href="{{ route('directors.edit', $director) }}">Editar</a>

                <form action="{{ route('directors.destroy', $director) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('¿Borrar director?')">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection