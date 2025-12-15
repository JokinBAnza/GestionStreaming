<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    // Muestra todos los géneros
    public function index()
    {
        $genres = Genre::all();
        return view('genres.index', compact('genres'));
    }

    // Muestra el formulario para crear un nuevo género
    public function create()
    {
        return view('genres.create');
    }

    // Guarda un nuevo género
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:genres,nombre',
        ]);

        Genre::create([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('genres.index')->with('success', 'Género creado correctamente.');
    }

    // Muestra el formulario para editar un género
    public function edit(Genre $genre)
    {
        return view('genres.edit', compact('genre'));
    }

    // Actualiza un género existente
    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:genres,nombre,' . $genre->id,
        ]);

        $genre->update([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('genres.index')->with('success', 'Género actualizado correctamente.');
    }

    // Elimina un género
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('genres.index')->with('success', 'Género eliminado correctamente.');
    }
}
