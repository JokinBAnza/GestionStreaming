@extends('layout')

@section('content')
    <h2>Media</h2>
    <a href="{{ route('media.create') }}" class="btn btn-primary mb-3">Insertar nueva película</a>

<table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Formato</th>
                <th>Director</th>
                <th>Estreno</th>
                <th>Géneros</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medias as $media)
                <tr>
                    <td>{{ $media->id }}</td>
                    <td>{{ $media->titulo }}</td>
                    <td>{{ $media->formato }}</td>
                    <td>
                        @if($media->directorRel)
                            <a href="{{ route('directors.medias', $media->directorRel) }}">
                                {{ $media->directorRel->nombre }}
                            </a>
                        @else
                            No asignado
                        @endif
                    </td>
                    <td>{{ $media->estreno }}</td>
                    <td>
                        @if($media->genres->isNotEmpty())
                            @foreach($media->genres as $genre)
                                <a href="{{ route('media.porGenero', $genre) }}">
                                    {{ $genre->nombre }}
                                </a>{{ !$loop->last ? ', ' : '' }}
                            @endforeach
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('media.edit', $media) }}" class="btn btn-sm btn-warning">Editar</a>

                        <form action="{{ route('media.destroy', $media) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Borrar media?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
