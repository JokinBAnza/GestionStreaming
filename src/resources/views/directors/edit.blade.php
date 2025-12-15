@extends('layout')

@section('content')
    <h2>Editar director</h2>

    <form action="{{ route('directors.update', $director) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre del director:</label><br>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $director->nombre) }}"><br><br>

        <label for="anoNacimiento">Año de nacimiento:</label><br>
        <input type="number" name="anoNacimiento" id="anoNacimiento" value="{{ old('anoNacimiento', $director->anoNacimiento) }}"><br><br>

        <button type="submit">Actualizar</button>
        <a href="{{ route('directors.index') }}">Cancelar</a>
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
