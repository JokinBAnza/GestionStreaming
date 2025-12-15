@extends('layout')

@section('content')
    <h2>Editar género</h2>

    <form action="{{ route('genres.update', $genre) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre del género:</label><br>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $genre->nombre) }}"><br><br>

        <button type="submit">Actualizar</button>
        <a href="{{ route('genres.index') }}">Cancelar</a>
    </form>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
