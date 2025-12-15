@extends('layout')

@section('content')
    <h2>Editar Usuario</h2>

    @if ($errors->any())
        <div class="alert error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <fieldset>
            <legend>Datos del Usuario</legend>

            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </fieldset>

        <fieldset>
            <legend>Datos del Perfil</legend>

            <label for="nombre">Nickname:</label>
            <input type="text" id="nombre" name="profile[nombre]" value="{{ old('profile.nombre', $user->profile->nombre ?? '') }}">

            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="profile[edad]" value="{{ old('profile.edad', $user->profile->edad ?? '') }}">

            <label for="sexo">Sexo:</label>
            <select id="sexo" name="profile[sexo]">
                <option value="">Seleccione</option>
                <option value="M" {{ (old('profile.sexo', $user->profile->sexo ?? '') == 'M') ? 'selected' : '' }}>Masculino</option>
                <option value="F" {{ (old('profile.sexo', $user->profile->sexo ?? '') == 'F') ? 'selected' : '' }}>Femenino</option>
            </select>
        </fieldset>

        <button type="submit">Actualizar Usuario</button>
    </form>

    <a href="{{ route('users.index') }}">Volver a la lista de usuarios</a>
@endsection
