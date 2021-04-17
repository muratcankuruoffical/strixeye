<?php

namespace Tests\Feature;

use App\Models\Pokemon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class PokemonTest extends TestCase
{
    use RefreshDatabase, WithFaker, WithoutMiddleware;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_get_all_pokemons()
    {
        $this->withoutExceptionHandling();
        Pokemon::factory()->count(20)->create();
        $response = $this->get(route('pokemons.index'))
            ->assertSuccessful();
    }
    public function test_can_get_a_single_pokemon()
    {
        $this->withoutExceptionHandling();
        $pokemon = Pokemon::factory()->create();
        $response = $this->get(route('pokemons.show', $pokemon->id))
            ->assertSuccessful();

    }
    public function test_can_create_an_pokemon()
    {
        $this->withoutExceptionHandling();
        $pokemon = Pokemon::factory()->make([
            'picture' => UploadedFile::fake()->create('test.png')
        ]);
        $response = $this->post(route('pokemons.store'), [
            'name' => $pokemon->name,
            'picture' => $pokemon->picture,
            'age' => $pokemon->age,
            'height' => $pokemon->height,
            'evolves_from' => $pokemon->evolves_from,
            'evolves_to' => $pokemon->evolves_to,
            'weakness' => $pokemon->weakness,
            'ability' => $pokemon->ability
        ])->assertRedirect(route('pokemons.index'));
    }

    public function test_can_update_an_pokemon()
    {
        $this->withoutExceptionHandling();
        $pokemon = Pokemon::factory()->create();
        $response = $this->patch(route('pokemons.update', $pokemon->id), [
            'name' => $this->faker->name(),
            'picture' => UploadedFile::fake()->create('test.png'),
            'age' => $this->faker->numberBetween(1, 99),
            'height' => $this->faker->numberBetween(1, 99),
            'evolves_from' => $this->faker->name(),
            'evolves_to' => $this->faker->name(),
            'weakness' => $this->faker->text(16),
            'ability' => $this->faker->text(16)
        ])->assertRedirect(route('pokemons.index'));
    }
    public function test_can_delete_an_pokemons()
    {
        $this->withoutExceptionHandling();
        $pokemon = Pokemon::factory()->create();
        $response = $this->delete(route('pokemons.destroy', $pokemon->id))
            ->assertRedirect(route('pokemons.index'));

    }
}
