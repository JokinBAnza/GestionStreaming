@extends('layout')

@section('content')
    <h2>Crear nuevo género</h2>

    <form action="{{ route('genres.store') }}" method="POST">
        @csrf

        <label for="nombre">Nombre del género:</label><br>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"><br><br>

        <button type="submit">Guardar</button>
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
