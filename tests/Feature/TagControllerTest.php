<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Models\Tag;

class TagControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function test_can_create_tag()
    {
        $response = $this->post(route('tags.store'), ['name' => 'New Tag']);

        $response->assertStatus(302)
                 ->assertRedirect(route('tags.index'))
                 ->assertSessionHas('success', 'Etiqueta creada exitosamente.');

        $this->assertDatabaseHas('tags', ['nombre' => 'New Tag']);
    }

    public function test_can_update_tag()
    {
        $tag = Tag::factory()->create(['nombre' => 'Old Tag']);

        $response = $this->put(route('tags.update', $tag->id), ['name' => 'Updated Tag']);

        $response->assertStatus(302)
                 ->assertRedirect(route('tags.index'))
                 ->assertSessionHas('success', 'Etiqueta actualizada exitosamente.');

        $this->assertDatabaseHas('tags', ['nombre' => 'Updated Tag']);
    }

    public function test_can_delete_tag()
    {
        $tag = Tag::factory()->create(['nombre' => 'Tag to Delete']);

        $response = $this->delete(route('tags.destroy', $tag->id));

        $response->assertStatus(302)
                 ->assertRedirect(route('tags.index'))
                 ->assertSessionHas('success', 'Etiqueta eliminada exitosamente.');

        $this->assertDatabaseMissing('tags', ['nombre' => 'Tag to Delete']);
    }
}
