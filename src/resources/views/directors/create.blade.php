@extends('layout')

@section('content')
    <h2>Crear nuevo director</h2>

    <form action="{{ route('directors.store') }}" method="POST">
        @csrf

        <label for="nombre">Nombre del director:</label><br>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"><br><br>

        <label for="anoNacimiento">Año de nacimiento:</label><br>
        <input type="number" name="anoNacimiento" id="anoNacimiento" value="{{ old('anoNacimiento') }}"><br><br>

        <button type="submit">Guardar</button>
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

