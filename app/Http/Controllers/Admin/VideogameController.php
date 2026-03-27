<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Console;
use App\Models\Genre;
use App\Models\Videogame;
use Illuminate\Http\Request;

class VideogameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videogames = Videogame::all();
        //dd($videogames);
        return view('videogames.index', compact('videogames'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $genres = Genre::all();
        $consoles = Console::all();
        return view('videogames.create', compact('genres', 'consoles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();

        $newVideogame = new Videogame();
        $newVideogame->titolo_videogame = $data['titolo_videogame'];
        $newVideogame->descrizione_videogame = $data['descrizione_videogame'];
        $newVideogame->anno_videogame = $data['anno_videogame'];
        $newVideogame->save();

        if ($request->has('genres')) {
            $newVideogame->genres()->attach($data['genres']);
        }
        if ($request->has('consoles')) {
            $newVideogame->consoles()->attach($data['consoles']);
        }

        return redirect()->route('videogames.show', $newVideogame);
    }

    /**
     * Display the specified resource.
     */
    public function show(Videogame $videogame)
    {
        //
        //dd($videogame->genres);
        return view('videogames.show', compact('videogame'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videogame $videogame)
    {
        //
        $genres = Genre::all();
        return view('videogames.edit', compact('videogame', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Videogame $videogame)
    {
        //
        $data = $request->all();
        $videogame->titolo_videogame = $data['titolo_videogame'];
        $videogame->descrizione_videogame = $data['descrizione_videogame'];
        $videogame->anno_videogame = $data['anno_videogame'];
        $videogame->update();
        if ($request->has('genres')) {
            $videogame->genres()->sync($data['genres']);
        } else {
            $videogame->genres()->detach();
        }

        return redirect()->route('videogames.show', $videogame);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videogame $videogame)
    {
        //
        $videogame->delete();
        return redirect()->route('videogames.index');
    }
}
