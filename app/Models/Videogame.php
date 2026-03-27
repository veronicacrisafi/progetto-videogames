<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videogame extends Model
{
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function consoles()
    {
        return $this->belongsToMany(Console::class);
    }

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }
}
