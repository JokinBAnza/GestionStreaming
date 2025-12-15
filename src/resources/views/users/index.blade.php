@extends('layout')

@section('content')
    <h2>Usuarios</h2>

    @if(session('success'))
        <div class="alert success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('users.create') }}" class="btn">Crear nuevo usuario</a>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Nickname</th>
                <th>Edad</th>
                <th>Sexo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->profile?->nombre ?? '-' }}</td>
                    <td>{{ $user->profile?->edad ?? '-' }}</td>
                    <td>{{ $user->profile?->sexo ?? '-' }}</td>
                    <td>
                        @if($user->profile)
                            <a href="{{ route('profiles.show', $user->profile->id) }}">Ver</a> |
                        @else
                            -
                        @endif
                        <a href="{{ route('users.edit', $user->id) }}">Editar</a> |
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Seguro que quieres eliminar este usuario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No hay usuarios registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
