<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;
use Database\Factories\CategoryFactory;
use Illuminate\Support\Facades\Storage;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_category()
    {
        $response = $this->post(route('categories.store'), [
            'nombre' => 'Test Category',
            'descripcion' => 'Test Description',
        ]);

        $response->assertRedirect(route('categories.index'));
        $this->assertCount(1, Category::all());
    }

    /** @test */
    public function it_can_update_a_category()
    {
        // Crear una categoría en la base de datos
        $category = Category::factory()->create();

        // Realizar una solicitud PUT para actualizar la categoría
        $response = $this->put(route('categories.update', $category->id), [
            'nombre' => 'Updated Nombre',
        ]);

        // Verificar que la redirección sea exitosa
        $response->assertRedirect(route('categories.index'));

        // Refrescar el modelo de la categoría desde la base de datos
        $category->refresh();

        // Verificar que el nombre se haya actualizado correctamente en la base de datos
        $this->assertEquals('Updated Nombre', $category->nombre, 'El nombre no se actualizó correctamente en la base de datos.');


    }
    /** @test */
    public function it_can_delete_a_category()
    {
        $category = Category::factory()->create();

        $response = $this->delete(route('categories.destroy', $category->id));

        $response->assertRedirect(route('categories.index'));
        $this->assertCount(0, Category::all());
    }
}
