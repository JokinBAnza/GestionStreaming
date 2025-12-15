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
            <select id="formato" name="formato" required>
                @foreach(['Pelicula', 'Serie', 'Documental'] as $opcion)
                    <option value="{{ $opcion }}" {{ old('formato', $media->formato) == $opcion ? 'selected' : '' }}>
                        {{ $opcion }}
                    </option>
                @endforeach
            </select>
            @error('formato')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="generos">Géneros:</label><br>
            <select name="generos[]" id="generos" multiple>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" {{ $media->genres->contains($genre->id) ? 'selected' : '' }}>
                        {{ $genre->nombre }}
                    </option>
                @endforeach
            </select><br><br>
        </div>

        <div>
            <label for="director_id">Director existente:</label>
            <select id="director_id" name="director_id">
                <option value="">-- Ninguno --</option>
                @foreach($directors as $director)
                    <option value="{{ $director->id }}" {{ old('director_id', $media->director) == $director->id ? 'selected' : '' }}>
                        {{ $director->nombre }}
                    </option>
                @endforeach
            </select>
            @error('director_id')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="nuevo_director">O añadir nuevo director:</label>
            <input type="text" id="nuevo_director" name="nuevo_director" value="{{ old('nuevo_director') }}">
            <input type="number" id="nuevo_director_ano" name="nuevo_director_ano" placeholder="Año nacimiento" value="{{ old('nuevo_director_ano') }}">
            @error('nuevo_director')
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
