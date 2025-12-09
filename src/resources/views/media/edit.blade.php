@extends('layout')

@section('content')
    <h2>Editar película</h2>

    <form action="{{ route('media.update', $media) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $media->titulo) }}" required>
            @error('titulo')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="formato">Formato:</label>
            <input type="text" id="formato" name="formato" value="{{ old('formato', $media->formato) }}">
            @error('formato')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="genero">Género:</label>
            <input type="text" id="genero" name="genero" value="{{ old('genero', $media->genero) }}">
            @error('genero')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="director">Director:</label>
            <input type="text" id="director" name="director" value="{{ old('director', $media->director) }}">
            @error('director')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="estreno">Año de estreno:</label>
            <input type="number" id="estreno" name="estreno" value="{{ old('estreno', $media->estreno) }}">
            @error('estreno')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>

        <br>
        <button type="submit">Actualizar</button>
        <a href="{{ route('media.index') }}">Cancelar</a>
    </form>
@endsection
