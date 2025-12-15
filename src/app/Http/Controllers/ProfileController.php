<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::all();
        return view('profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
    return view('profiles.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
        'nombre' => 'required|string|max:255',
        'edad' => 'required|integer|min:1|max:120',
        'sexo' => 'required|in:H,M',
        'user_id' => 'required|exists:users,id',
    ]);

    Profile::create([
        'nombre' => $request->nombre,
        'edad' => $request->edad,
        'sexo' => $request->sexo,
        'user_id' => $request->user_id,
    ]);

    return redirect()->route('profiles.index')->with('success', 'Perfil creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
   public function show(Profile $profile)
{
    // No necesitas traer todos los perfiles, solo este
    return view('profiles.show', compact('profile'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        $users = User::all(); // para elegir usuario asociado
    return view('profiles.edit', compact('profile', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'edad' => 'required|integer|min:1|max:120',
        'sexo' => 'required|in:H,M',
        'user_id' => 'required|exists:users,id',
    ]);

    $profile->update([
        'nombre' => $request->nombre,
        'edad' => $request->edad,
        'sexo' => $request->sexo,
        'user_id' => $request->user_id,
    ]);

    return redirect()->route('profiles.index')->with('success', 'Perfil actualizado correctamente.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        return redirect()->route('profiles.index');
    }
}
