<?php

namespace Database\Seeders;

use App\Models\Videogame;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class VideogamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //prova con faker e ciclo for
        for ($i = 0; $i < 10; $i++) {
            $newVideogame = new Videogame();
            $newVideogame->titolo_videogame = $faker->sentence(2);
            $newVideogame->descrizione_videogame = $faker->paragraph();
            $newVideogame->anno_videogame = $faker->numberBetween(1980, 2026);
            $newVideogame->save();
        };
    }
}
