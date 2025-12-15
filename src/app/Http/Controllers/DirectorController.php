<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    // Muestra todos los directores
    public function index()
    {
        $directors = Director::all();
        return view('directors.index', compact('directors'));
    }

    // Muestra el formulario para crear un nuevo director
    public function create()
    {
        return view('directors.create');
    }

    // Guarda un nuevo director
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:directors,nombre',
            'anoNacimiento' => 'required|integer|min:1800|max:' . date('Y'),
        ]);

        Director::create([
            'nombre' => $request->nombre,
            'anoNacimiento' => $request->anoNacimiento,
        ]);

        return redirect()->route('directors.index')->with('success', 'Director creado correctamente.');
    }

    // Muestra el formulario para editar un director
    public function edit(Director $director)
    {
        return view('directors.edit', compact('director'));
    }

    // Actualiza un director existente
    public function update(Request $request, Director $director)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:directors,nombre,' . $director->id,
            'anoNacimiento' => 'required|integer|min:1800|max:' . date('Y'),
        ]);

        $director->update([
            'nombre' => $request->nombre,
            'anoNacimiento' => $request->anoNacimiento,
        ]);

        return redirect()->route('directors.index')->with('success', 'Director actualizado correctamente.');
    }

    // Elimina un director
    public function destroy(Director $director)
{
    // Comprobar si tiene películas asociadas
    if ($director->medias()->count() > 0) {
        return back()->with('error', 'No se puede eliminar, tiene películas asociadas.');
    }

    // Si no tiene películas, se puede eliminar
    $director->delete();

    return redirect()->route('directors.index')->with('success', 'Director eliminado correctamente.');
}
// Muestra las películas de un director
public function medias(Director $director)
{
    $medias = $director->medias; // obtiene todas las películas/obras de ese director
    return view('media.index', compact('medias', 'director'));
}


}
