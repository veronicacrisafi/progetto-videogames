<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Console;
use App\Models\Developer;
use App\Models\Genre;
use App\Models\Videogame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $developers = Developer::all();
        return view('videogames.create', compact('genres', 'consoles', 'developers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titolo_videogame' => 'required|string|max:255',
            'descrizione_videogame' => 'required|string',
            'anno_videogame' => 'required|integer|min:1950|max:2100',
            'developer_id' => 'required|exists:developers,id',
            'genres' => 'nullable|array',
            'consoles' => 'nullable|array',
            'image' => 'nullable|image|mimes:jpeg,png,gif,webp|max:5120',
        ]);

        $newVideogame = new Videogame();
        $newVideogame->titolo_videogame = $data['titolo_videogame'];
        $newVideogame->descrizione_videogame = $data['descrizione_videogame'];
        $newVideogame->anno_videogame = $data['anno_videogame'];
        $newVideogame->developer_id = $data['developer_id'];
        $newVideogame->save();

        if ($request->hasFile('image')) {
            $img_url = Storage::putFile('videogames', $data['image']);
            $newVideogame->image = $img_url;
            $newVideogame->save();
        }

        if (isset($data['genres'])) {
            $newVideogame->genres()->attach($data['genres']);
        }
        if (isset($data['consoles'])) {
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
        $consoles = Console::all();
        $developers = Developer::all();
        return view('videogames.edit', compact('videogame', 'genres', 'consoles', 'developers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Videogame $videogame)
    {
        $data = $request->validate([
            'titolo_videogame' => 'required|string|max:255',
            'descrizione_videogame' => 'required|string',
            'anno_videogame' => 'required|integer|min:1950|max:2100',
            'developer_id' => 'required|exists:developers,id',
            'genres' => 'nullable|array',
            'consoles' => 'nullable|array',
            'image' => 'nullable|image|mimes:jpeg,png,gif,webp|max:25600',
        ]);

        $videogame->titolo_videogame = $data['titolo_videogame'];
        $videogame->descrizione_videogame = $data['descrizione_videogame'];
        $videogame->anno_videogame = $data['anno_videogame'];
        $videogame->developer_id = $data['developer_id'];

        if ($request->hasFile('image')) {
            if ($videogame->image) {
                Storage::delete($videogame->image);
            }
            $img_url = Storage::putFile('videogames', $data['image']);
            $videogame->image = $img_url;
        }

        $videogame->save();

        if (isset($data['genres'])) {
            $videogame->genres()->sync($data['genres']);
        } else {
            $videogame->genres()->detach();
        }
        if (isset($data['consoles'])) {
            $videogame->consoles()->sync($data['consoles']);
        } else {
            $videogame->consoles()->detach();
        }

        return redirect()->route('videogames.show', $videogame);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videogame $videogame)
    {
        //
        $videogame->genres()->detach();
        $videogame->consoles()->detach();
        if ($videogame->image) {
            Storage::delete($videogame->image);
        }
        $videogame->delete();
        return redirect()->route('videogames.index');
    }
}
