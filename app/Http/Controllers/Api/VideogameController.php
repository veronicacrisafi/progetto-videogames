<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideogameController extends Controller
{
    //
    public function index()
    {
        return response()->json(
            [
                "success" => true,
                "data" => 'tutto funziona bene '

            ]
        );
    }
}
