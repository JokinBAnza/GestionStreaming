@extends('layout')

@section('content')
    <h2 class="page-title">Crear nuevo perfil</h2>

    <form action="{{ route('profiles.store') }}" method="POST" class="form-netflix">
        @csrf

        {{-- Nombre --}}
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input 
                type="text" 
                id="nombre" 
                name="nombre" 
                value="{{ old('nombre') }}" 
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
                value="{{ old('edad') }}" 
                required
            >
        </div>

        {{-- Sexo --}}
        <div class="form-group">
            <label for="sexo">Sexo</label>
            <select id="sexo" name="sexo" required>
                <option value="">Seleccionar sexo</option>
                <option value="H" {{ old('sexo') == 'H' ? 'selected' : '' }}>Hombre</option>
                <option value="M" {{ old('sexo') == 'M' ? 'selected' : '' }}>Mujer</option>
            </select>
        </div>

        {{-- Usuario asociado --}}
        <div class="form-group">
            <label for="user_id">Usuario asociado</label>
            <select id="user_id" name="user_id" required>
                <option value="">Seleccionar usuario</option>

                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->email }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn-save" style="margin-top:15px;">Crear perfil</button>
        <a href="{{ route('profiles.index') }}" class="btn-cancel" style="margin-left:10px;">Cancelar</a>
    </form>
@endsection
