<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Videogame;
use Illuminate\Http\Request;

class VideogameController extends Controller
{
    //
    public function index()
    {
        $videogames = Videogame::with(['genres', 'consoles', 'developer'])->get();

        return response()->json([
            "success" => true,
            "data" => $videogames
        ]);
    }

    public function show($id)
    {
        $videogame = Videogame::with(['genres', 'consoles', 'developer'])->findOrFail($id);
        return response()->json([
            "success" => true,
            "data" => $videogame
        ]);
    }
}
