<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('profile')->get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'profile.nombre' => 'required|string',
            'profile.edad' => 'required|integer',
            'profile.sexo' => 'required|string|in:M,F'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Crear perfil asociado
        if ($request->filled('profile')) {
            $user->profile()->create([
                'nombre' => $request->profile['nombre'],
                'edad' => $request->profile['edad'],
                'sexo' => $request->profile['sexo'],
            ]);
        }

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $user = User::with('profile')->findOrFail($id);

    if ($user->profile) {
        return redirect()->route('profiles.show', $user->profile->id);
    }

    return redirect()->route('users.index')->with('error', 'Usuario sin perfil.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::with('profile')->findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
{
    // Validación de usuario
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'profile.nombre' => 'nullable|string|max:255',
        'profile.edad' => 'nullable|integer|min:0',
        'profile.sexo' => 'nullable|in:M,F',
    ]);

    // Actualizar datos del usuario
    $user->update($request->only(['name', 'email']));

    // Actualizar o crear perfil si viene información
    if ($request->has('profile')) {
        $profileData = $request->input('profile');

        if ($user->profile) {
            // Actualizar perfil existente
            $user->profile->update($profileData);
        } else {
            // Crear nuevo perfil asociado al usuario
            $user->profile()->create($profileData);
        }
    }

    return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        if ($user->profile) {
            $user->profile()->delete(); // eliminar perfil asociado
        }
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
