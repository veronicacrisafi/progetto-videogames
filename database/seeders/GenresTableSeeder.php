<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //
        $genres = [
            'Azione',
            'Avventura',
            'Azione-Avventura',
            'GDR (Giochi di Ruolo)',
            'Sparatutto (Shooter)',
            'Strategia',
            'Simulazione',
            'Sportivi e Corse',
            'Battle Royale',
            'Soulslike',
            'Survival Horror',
            'Metroidvania',
            'Roguelike/Roguelite',
            'MOBA',
            'Sandbox/Open World',
            'Visual Novel',
            'Casual Games',
        ];

        foreach ($genres as $genre) {
            $newGenre = new Genre();
            $newGenre->genere_videogame = $genre;
            $newGenre->colore = $faker->hexColor();
            $newGenre->save();
        }
    }
}
