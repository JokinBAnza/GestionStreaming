@extends('layout')

@section('content')
    <h2 class="page-title">Editar perfil</h2>

    <form action="{{ route('profiles.update', $profile) }}" method="POST" class="form-netflix">
        @csrf
        @method('PUT')

        {{-- Nombre --}}
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input 
                type="text" 
                id="nombre" 
                name="nombre" 
                value="{{ old('nombre', $profile->nombre) }}" 
                required
            >
        </div>

        {{-- Edad --}}
        <div class="form-group">
            <label for="edad">Edad</label>
            <input 
                type="number" 
                id="edad" 
                name="edad" 
                value="{{ old('edad', $profile->edad) }}" 
                required
            >
        </div>

        {{-- Sexo --}}
        <div class="form-group">
            <label for="sexo">Sexo</label>
            <select id="sexo" name="sexo" required>
                <option value="H" {{ $profile->sexo == 'H' ? 'selected' : '' }}>Hombre</option>
                <option value="M" {{ $profile->sexo == 'M' ? 'selected' : '' }}>Mujer</option>
            </select>
        </div>

        {{-- Usuario --}}
        <div class="form-group">
            <label for="user_id">Usuario asociado</label>
            <select id="user_id" name="user_id" required>
                <option value="">Seleccionar usuario</option>

                @foreach($users as $user)
                    <option 
                        value="{{ $user->id }}" 
                        {{ $profile->user_id == $user->id ? 'selected' : '' }}
                    >
                        {{ $user->email }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn-save" style="margin-top:15px;">Guardar cambios</button>
        <a href="{{ route('profiles.index') }}" class="btn-cancel" style="margin-left:10px;">Cancelar</a>
    </form>
@endsection
