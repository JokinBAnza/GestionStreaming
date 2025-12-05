@extends('layout')

@section('content')
    <h2>Media</h2>
    <a href="{{ route('media.create') }}">Insertar nueva película</a>
    <br><br>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Formato</th>
                <th>Género</th>
                <th>Director</th>
                <th>Estreno</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($media as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->titulo}}</td>
                <td>{{ $product->formato }}</td>
                <td>{{ $product->genero }}</td>
                <td>{{ $product->director }}</td>
                <td>{{ $product->estreno }}</td>
                <td>
                    <a href="{{ route('media.edit', $product) }}">Editar</a>

                    <form id="formBorrar" action="{{ route('media.destroy', $product) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button id="botonBorrar" type="submit" onclick="return confirm('¿Borrar producto?')">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection