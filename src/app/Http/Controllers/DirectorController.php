<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return view('directors.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('directors.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('directors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Director $director)
    {
        return view('directors.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Director $director)
    {
        return view('directors.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Director $director)
    {
        return view('directors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Director $director)
    {
        return view('directors.index');
    }
}
