@extends('layout')

@section('content')
    <h2>Editar película</h2>

    <form action="{{ route('media.update', $media) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="titulo">Título:</label><br>
        <input type="text" name="titulo" id="titulo" value="{{ $media->titulo }}"><br><br>

        <label for="formato">Formato:</label><br>
        <input type="text" name="formato" id="formato" value="{{ $media->formato }}"><br><br>

        <label for="genero">Género:</label><br>
        <input type="text" name="genero" id="genero" value="{{ $media->genero }}"><br><br>

        <label for="director">Director:</label><br>
        <input type="text" name="director" id="director" value="{{ $media->director }}"><br><br>

        <label for="estreno">Estreno:</label><br>
        <input type="date" name="estreno" id="estreno" value="{{ $media->estreno }}"><br><br>

        <button type="submit">Actualizar</button>
        <a href="{{ route('media.index') }}">Cancelar</a>
    </form>
@endsection
