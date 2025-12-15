@extends('layout')

@section('content')
    <h2 class="page-title">Perfiles</h2>

    <a href="{{ route('profiles.create') }}" class="btn-save" style="display:inline-block; margin-bottom:15px;">
        Crear nuevo perfil
    </a>

    <table class="table-netflix">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nickname</th>
                <th>Edad</th>
                <th>Sexo</th>
                <th>Usuario asociado</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($profiles as $profile)
                <tr>
                    <td>{{ $profile->id }}</td>
                    <td>{{ $profile->nombre }}</td>
                    <td>{{ $profile->edad }}</td>
                    <td>{{ $profile->sexo }}</td>
                    <td>{{$profile->user->id ?? 'Sin usuario'}}</td>
                    <td>{{ $profile->user->email ?? 'Sin email' }}</td>

                    <td>
                        <a href="{{ route('profiles.edit', $profile) }}" class="btn-save" style="padding:6px 10px;">
                            Editar
                        </a>

                        <form action="{{ route('profiles.destroy', $profile) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn-cancel" style="padding:6px 10px;" onclick="return confirm('¿Borrar perfil?')">
                                Borrar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
