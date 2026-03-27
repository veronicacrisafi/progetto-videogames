<?php

namespace Database\Seeders;

use App\Models\Developer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DevelopersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $developers = [
            'Nintendo',
            'Sony Interactive Entertainment',
            'Microsoft Studios',
            'Ubisoft',
            'Electronic Arts',
            'Square Enix',
            'Capcom',
            'Rockstar Games',
            'Bethesda',
            'Bandai Namco'
        ];

        foreach ($developers as $developer) {
            $newDeveloper = new Developer();
            $newDeveloper->nome_sviluppatore = $developer;

            $newDeveloper->save();
        }
    }
}
