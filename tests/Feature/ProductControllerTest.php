<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Database\Factories\ProductFactory;
use Illuminate\Support\Facades\Storage;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testCrearProducto()
    {
        Storage::fake('public');
    
        $imagen = UploadedFile::fake()->image('product.jpg');
    
        $response = $this->post('/products', [
            'nombre' => 'Nuevo Producto',
            'descripcion' => 'Descripción del producto',
            'precio' => 10.99,
            'imagen' => $imagen,
        ]);
    
        $response->assertStatus(302); // Redirección
        $this->assertDatabaseHas('products', ['nombre' => 'Nuevo Producto']); // Verifica que el producto se haya creado en la base de datos
    }

    public function testActualizarProducto()
    {
        Storage::fake('public');
        $product = Product::factory()->create();

        $response = $this->put("/products/{$product->id}", [
            'nombre' => 'Producto Actualizado',
            'descripcion' => 'Nueva descripción del producto',
            'precio' => 20.99,
            'imagen' => UploadedFile::fake()->image('updated_product.jpg'),
        ]);

        $response->assertStatus(302); // Redirección
        $this->assertDatabaseHas('products', ['nombre' => 'Producto Actualizado']); // Verifica que el producto se haya actualizado en la base de datos
    }

    public function testEliminarProducto()
    {
        $product = Product::factory()->create();

        $response = $this->delete("/products/{$product->id}");

        $response->assertStatus(302); // Redirección
        $this->assertDatabaseMissing('products', ['id' => $product->id]); // Verifica que el producto se haya eliminado de la base de datos
    }
}
