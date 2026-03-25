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
    public function run(): void
    {
        $videogiochiHorror = [
            [
                'titolo_videogame' => 'Resident Evil',
                'descrizione_videogame' => 'Un classico survival horror con zombie e misteri.',
                'anno_videogame' => 1996,
            ],
            [
                'titolo_videogame' => 'Silent Hill',
                'descrizione_videogame' => 'Un horror psicologico ambientato in una città nebbiosa.',
                'anno_videogame' => 1999,
            ],
            [
                'titolo_videogame' => 'Outlast',
                'descrizione_videogame' => 'Un survival horror in prima persona in un manicomio abbandonato.',
                'anno_videogame' => 2013,
            ],
            [
                'titolo_videogame' => 'Call of Duty',
                'descrizione_videogame' => 'Uno sparatutto in prima persona ambientato in scenari di guerra realistica.',
                'anno_videogame' => 2003,
            ],
            [
                'titolo_videogame' => 'God of War',
                'descrizione_videogame' => 'Un action-adventure mitologico con combattimenti epici e una forte componente narrativa.',
                'anno_videogame' => 2005,
            ],
            [
                'titolo_videogame' => 'Dead Space',
                'descrizione_videogame' => 'Un horror fantascientifico in terza persona ambientato nello spazio profondo.',
                'anno_videogame' => 2008,
            ],

        ];
        foreach ($videogiochiHorror as $gioco) {
            $newVideogame = new Videogame();
            $newVideogame->titolo_videogame = $gioco['titolo_videogame'];
            $newVideogame->descrizione_videogame = $gioco['descrizione_videogame'];
            $newVideogame->anno_videogame = $gioco['anno_videogame'];
            $newVideogame->save();
        }
    }
}
