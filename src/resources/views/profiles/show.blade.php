@extends('layout')

@section('content')
    <h2 class="page-title">Perfil:</h2>

    <table class="table-netflix">
        <tr>
            <th>ID</th>
            <td>{{ $profile->id }}</td>
        </tr>
        <tr>
            <th>Nombre</th>
            <td>{{ $profile->nombre }}</td>
        </tr>
        <tr>
            <th>Edad</th>
            <td>{{ $profile->edad }}</td>
        </tr>
        <tr>
            <th>Sexo</th>
            <td>{{ $profile->sexo == 'H' ? 'Hombre' : 'Mujer' }}</td>
        </tr>
        <tr>
            <th>Usuario asociado</th>
            <td>{{ $profile->user->email ?? 'Sin usuario' }}</td>
        </tr>
    </table>

    <a href="{{ route('profiles.index') }}" class="btn-cancel" style="margin-top:15px;">Volver</a>
@endsection
