<?php

namespace Tests\Feature;

use App\Models\Pokemon;
use App\Models\PokemonPossessor;
use App\Models\Possessor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class PokemonPossessorTest extends TestCase
{
    use RefreshDatabase, WithFaker, WithoutMiddleware;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_assign_pokemon_to_possessor()
    {
        $this->withoutExceptionHandling();
        $possessor = Possessor::factory()->create();
        $pokemon = Pokemon::factory()->create();
        $response = $this->post(route('assign_pokemon_to_possessor'), [
            'possessor_id' => $possessor->id,
            'pokemon_id' => $pokemon->id,
        ])->assertRedirect(route('possessors.index'));
    }

    public function test_can_remove_pokemon_from_possessor()
    {
        $this->withoutExceptionHandling();
        $possessor = Possessor::factory()->create();
        $pokemon = Pokemon::factory()->create();
        $response = $this->get(route('remove_pokemon_from_possessor', [
            'possessor' => $possessor->id,
            'pokemon' => $pokemon->id,
        ]))->assertRedirect(route('possessors.index'));
    }
}
