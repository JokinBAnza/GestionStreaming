@extends('layout')

@section('content')
    <h2>Insertar nueva película</h2>

    <form action="{{ route('media.store') }}" method="POST">
        @csrf

        <label for="titulo">Título:</label><br>
        <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}"><br><br>

        <label for="formato">Formato:</label><br>
        <select name="formato" id="formato">
            <option value="Pelicula" {{ old('formato') == 'Pelicula' ? 'selected' : '' }}>Pelicula</option>
            <option value="Serie" {{ old('formato') == 'Serie' ? 'selected' : '' }}>Serie</option>
            <option value="Documental" {{ old('formato') == 'Documental' ? 'selected' : '' }}>Documental</option>
        </select><br><br>

        <label for="generos">Géneros:</label><br>
        <select name="generos[]" id="generos" multiple>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}" {{ (collect(old('generos'))->contains($genre->id)) ? 'selected' : '' }}>
                    {{ $genre->nombre }}
                </option>
            @endforeach
        </select><br><br>


     <label for="director">Director:</label><br>
<select name="director_id" id="director">
    <option value="">-- Selecciona un director --</option>
    @foreach($directors as $director)
        <option value="{{ $director->id }}" {{ old('director_id') == $director->id ? 'selected' : '' }}>
            {{ $director->nombre }}
        </option>
    @endforeach
</select>
<br><br>

<label for="nuevo_director">O añadir uno nuevo:</label><br>
<input type="text" name="nuevo_director" placeholder="Nombre del nuevo director" value="{{ old('nuevo_director') }}">
<br>
<label for="nuevo_director_ano">Año de nacimiento:</label><br>
<input type="number" name="nuevo_director_ano" placeholder="Año de nacimiento" value="{{ old('nuevo_director_ano') }}">
<br><br>



        <label for="estreno">Año de estreno:</label><br>
        <input type="number" name="estreno" id="estreno" value="{{ old('estreno') }}" min="1800" max="{{ date('Y') }}"><br><br>


        <button type="submit">Guardar</button>
        <a href="{{ route('media.index') }}">Cancelar</a>
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
