<?php

namespace Database\Seeders;

use App\Models\PokemonPossessor;
use Illuminate\Database\Seeder;

class PokemonPossessorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PokemonPossessor::factory(100)->create();
    }
}
