<?php

namespace App\Http\Controllers;

use App\Models\MiLista;
use Illuminate\Http\Request;
use App\Models\Media;
use Illuminate\Support\Facades\Auth;

class MiListaController extends Controller
{
    public function index()
    {
        $lista = Auth::user()->miLista;
        return view('mi_lista.index', compact('lista'));
    }

    public function store(Media $media)
    {
        Auth::user()->miLista()->syncWithoutDetaching($media->id);
        return back()->with('success', 'Añadido a tu lista.');
    }

    public function destroy(Media $media)
    {
        Auth::user()->miLista()->detach($media->id);
        return back()->with('success', 'Eliminado de tu lista.');
    }
}
