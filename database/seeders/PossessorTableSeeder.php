<?php

namespace Database\Seeders;

use App\Models\Possessor;
use Illuminate\Database\Seeder;

class PossessorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Possessor::factory(100)->create();
    }
}
