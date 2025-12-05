@extends('layout')

@section('content')
    <h2>Editar Producto</h2>

    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Proveedores:</label><br>
        <select name="proveedores[]" multiple required>
            @foreach($proveedores as $proveedor)
                <option value="{{ $proveedor->id }}"
                    {{ $product->proveedores->contains($proveedor->id) ? 'selected' : '' }}>
                    {{ $proveedor->nombre }}
                </option>
            @endforeach
        </select><br><br>
        <label for="category_id">Categoría:</label><br>
        <select name="idCategoria" id="idCategoria" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" 
                    {{ $product->idCategoria == $category->id ? 'selected' : '' }}>
                    {{ $category->nombre }}
                </option>
            @endforeach
        </select><br><br>

        <label for="name">Nombre del Producto:</label><br>
        <input type="text" name="nombre" value="{{ $product->nombre }}" required><br><br>

        <label for="price">Precio:</label><br>
        <input type="number" step="0.01" name="precio" value="{{ $product->precio }}" required><br><br>

        <label for="stock">Stock:</label><br>
        <input type="number" name="cantidadStock" value="{{ $product->cantidadStock }}" required><br><br>

        <button type="submit">Actualizar Producto</button>
    </form>

    <br>
    <a href="{{ route('products.index') }}">Volver al listado</a>
@endsection