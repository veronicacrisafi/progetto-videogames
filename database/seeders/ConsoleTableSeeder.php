<?php

namespace Database\Seeders;

use App\Models\Console;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $consoles = [
            'PlayStation 5',
            'PlayStation 4',
            'Xbox Series X',
            'Xbox One',
            'Nintendo Switch',
            'PC',
            'Steam Deck',
            'Nintendo 3DS',
            'PlayStation Vita'
        ];

        foreach ($consoles as $console) {
            $newConsole = new Console();
            $newConsole->nome_console = $console;
            $newConsole->save();
        }
    }
}
