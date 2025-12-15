<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Genre;
use App\Models\Director;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    // Muestra todos los medios
   public function index()
{
    $medias= Media::with('directorRel', 'genres')->get(); // eager loading
    return view('media.index', compact('medias'));
}

    // Muestra el formulario para crear un nuevo medio
    public function create()
    {
        $genres = Genre::all();
        $directors = Director::all();

        return view('media.create', compact('genres', 'directors'));
    }

    // Guarda un nuevo medio
public function store(Request $request)
{
    $request->validate([
        'titulo' => 'required|string|max:255',
        'formato' => 'required|in:Pelicula,Serie,Documental',
        'generos' => 'required|array',
        'generos.*' => 'exists:genres,id',
        'director_id' => 'nullable|exists:directors,id',
        'nuevo_director' => 'nullable|string|max:255',
        'nuevo_director_ano' => 'nullable|integer|min:1800|max:' . date('Y'),
        'estreno' => 'required|integer|min:1800|max:' . date('Y'),
    ]);

    // Crear director nuevo si se proporciona
    if ($request->filled('nuevo_director')) {
        $director = Director::create([
            'nombre' => $request->nuevo_director,
            'anoNacimiento' => $request->nuevo_director_ano ?? 1900
        ]);
        $director_id = $director->id;
    } else {
        $director_id = $request->director_id;
    }

    $media = Media::create([
        'titulo' => $request->titulo,
        'formato' => $request->formato,
        'director' => $director_id, // ideal: renombrar columna a director_id
        'estreno' => $request->estreno,
    ]);

    // Guardar géneros
    $media->genres()->sync($request->generos);

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
    $genres = Genre::all();
    $directors = Director::all();

    return view('media.edit', compact('media', 'genres', 'directors'));
}


    // Actualiza un medio existente
  public function update(Request $request, Media $media)
{
    $request->validate([
        'titulo' => 'required|string|max:255',
        'formato' => 'required|in:Pelicula,Serie,Documental',
        'generos' => 'required|array',
        'generos.*' => 'exists:genres,id',
        'director_id' => 'nullable|exists:directors,id',
        'nuevo_director' => 'nullable|string|max:255',
        'estreno' => 'required|integer|min:1800|max:' . date('Y'),
    ]);

   // Crear director nuevo si se proporciona
if ($request->filled('nuevo_director')) {
    $director = Director::create([
        'nombre' => $request->nuevo_director,
        'anoNacimiento' => $request->nuevo_director_ano ?? 1900
    ]);
    $director_id = $director->id;
} else {
    $director_id = $request->director_id;
}


    $anioEstreno = date('Y', strtotime($request->estreno));

    $media->update([
        'titulo' => $request->titulo,
        'formato' => $request->formato,
        'director' => $director_id,
        'estreno' => $anioEstreno,
    ]);

    $media->genres()->sync($request->generos);

    return redirect()->route('media.index')->with('success', 'Película actualizada correctamente.');
}


    // Elimina un medio
    public function destroy(Media $media)
    {
        $media->delete();
        return redirect()->route('media.index')->with('success', 'Película eliminada correctamente.');
    }
    public function porGenero(Genre $genre)
{
    $medias = $genre->medias; // todas las medias asociadas al género
    return view('media.index', compact('medias')); // reutilizas tu vista de medias
}

}
