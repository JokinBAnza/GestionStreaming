@extends('layout')

@section('content')
    <h2>Usuarios</h2>

    @if(session('success'))
        <div class="alert success">{{ session('success') }}</div>
    @endif

    <h2>Mi Lista</h2>

@foreach($lista as $media)
    <div>
        <h3>{{ $media->titulo }} ({{ $media->formato }})</h3>
        <form action="{{ route('mi_lista.destroy', $media) }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Eliminar</button>
        </form>
    </div>
@endforeach
@endsection
