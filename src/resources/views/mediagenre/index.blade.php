@extends('layout')

@section('content')
    <h2>Media-Genre</h2>
    <br><br>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Media ID</th>
                <th>Genre ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mediagenre as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->id_media}}</td>
                <td>{{ $product->id_genre }}</td>
                <td>{{ $product->genero }}</td>
                <td>{{ $product->director }}</td>
                <td>{{ $product->estreno }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection