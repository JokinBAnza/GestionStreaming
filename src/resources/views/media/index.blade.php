@extends('layout')

@section('content')
    <h2>Media</h2>
    <a href="{{ route('media.create') }}">Insertar nueva película</a>
    <br><br>

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
        {{ $media->directorRel->nombre }}
    @else
        No asignado
    @endif
</td>


                <td>{{ $media->estreno }}</td>
                <td>
                    @if($media->genres->isNotEmpty())
                        {{ $media->genres->pluck('nombre')->join(', ') }}
                    @else
                        -
                    @endif
                </td>
                <td>
                    <a href="{{ route('media.edit', $media) }}">Editar</a>

                    <form id="formBorrar" action="{{ route('media.destroy', $media) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button id="botonBorrar" type="submit" onclick="return confirm('¿Borrar media?')">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
