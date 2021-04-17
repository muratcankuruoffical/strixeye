<?php

namespace Database\Seeders;

use App\Models\Pokemon;
use App\Models\PokemonPossessor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(PossessorTableSeeder::class);
        $this->call(PokemonTableSeeder::class);
        $this->call(PokemonPossessorTableSeeder::class);

    }
}
