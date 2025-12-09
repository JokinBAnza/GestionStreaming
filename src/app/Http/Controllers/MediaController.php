<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    // Muestra todos los medios
    public function index()
    {
        $media = Media::all();
        return view('media.index', compact('media'));
    }

    // Muestra el formulario para crear un nuevo medio
    public function create()
    {
        return view('media.create'); // Vista separada para crear
    }

    // Guarda un nuevo medio
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'formato' => 'nullable|string|max:255',
            'genero' => 'nullable|string|max:255',
            'director' => 'nullable|string|max:255',
            'estreno' => 'nullable|integer',
        ]);

        Media::create($request->all());

        return redirect()->route('media.index')->with('success', 'Película creada correctamente.');
    }

    // Muestra un medio específico (opcional)
    public function show(Media $media)
    {
        return view('media.show', compact('media')); // Vista opcional
    }

    // Muestra el formulario para editar un medio
    public function edit(Media $media)
    {
        return view('media.edit', compact('media')); // Vista edit separada
    }

    // Actualiza un medio existente
    public function update(Request $request, Media $media)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'formato' => 'nullable|string|max:255',
            'genero' => 'nullable|string|max:255',
            'director' => 'nullable|string|max:255',
            'estreno' => 'nullable|integer',
        ]);

        $media->update($request->all());

        return redirect()->route('media.index')->with('success', 'Película actualizada correctamente.');
    }

    // Elimina un medio
    public function destroy(Media $media)
    {
        $media->delete();
        return redirect()->route('media.index')->with('success', 'Película eliminada correctamente.');
    }
}
