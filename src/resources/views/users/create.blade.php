@extends('layout')

@section('content')
    <h2>Crear Usuario</h2>

    @if ($errors->any())
        <div class="alert error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <fieldset>
            <legend>Usuario</legend>

            <label>Nombre:</label>
            <input type="text" name="name" value="{{ old('name') }}" required>

            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required>

            <label>Contraseña:</label>
            <input type="password" name="password" required>

            <label>Confirmar Contraseña:</label>
            <input type="password" name="password_confirmation" required>
        </fieldset>

        <fieldset>
            <legend>Perfil</legend>

            <label>Nickname:</label>
            <input type="text" name="profile[nombre]" value="{{ old('profile.nombre') }}" required>

            <label>Edad:</label>
            <input type="number" name="profile[edad]" value="{{ old('profile.edad') }}" required>

            <label>Sexo:</label>
            <select name="profile[sexo]" required>
                <option value="M" {{ old('profile.sexo') == 'M' ? 'selected' : '' }}>H</option>
                <option value="F" {{ old('profile.sexo') == 'F' ? 'selected' : '' }}>M</option>
            </select>
        </fieldset>

        <button type="submit">Crear Usuario</button>
    </form>
@endsection
