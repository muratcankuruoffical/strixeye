<?php

namespace Tests\Feature;

use App\Models\Possessor;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class PossessorTest extends TestCase
{
    use RefreshDatabase, WithFaker, WithoutMiddleware;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_get_all_possessors()
    {
        $this->withoutExceptionHandling();
        Possessor::factory()->count(10)->create();
        $response = $this->get(route('possessors.index'));
        $response->assertSuccessful();
    }

    public function test_can_get_a_single_possessor()
    {
        $this->withoutExceptionHandling();
        $possessor = Possessor::factory()->create();
        $response = $this->get(route('possessors.show', $possessor));
        $response->assertSuccessful();
    }

    public function test_can_update_an_possessor()
    {
        $this->withoutExceptionHandling();
        $possessor = Possessor::factory()->create();
        $response = $this->patch(route('possessors.update', $possessor), [
            'name' => $this->faker->name(),
            'picture' => UploadedFile::fake()->create('test.png'),
            'age' => $this->faker->numberBetween(1, 99),
            'score' => $this->faker->numberBetween(1, 999)
        ])->assertRedirect(route('possessors.index'));
    }

    public function test_can_create_an_possessor()
    {
        $this->withoutExceptionHandling();
        $possessor = Possessor::factory()->make([
            'picture' => UploadedFile::fake()->create('test.png')
        ]);
        $response = $this->post(route('possessors.store'), $possessor->toArray())
            ->assertRedirect(route('possessors.index'));

    }

    public function test_can_delete_an_possessor()
    {
        $this->withoutExceptionHandling();
        $possessor = Possessor::factory()->create();
        $response = $this->delete(route('possessors.destroy', $possessor))
            ->assertRedirect(route('possessors.index'));
    }
}
