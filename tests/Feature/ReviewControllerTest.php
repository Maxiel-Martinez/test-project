<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class ReviewControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_method_returns_view_with_reviews()
    {
        $response = $this->get(route('reviews.index'));

        $response->assertStatus(200);
        $response->assertViewIs('reviews.index');
        $response->assertViewHas('reviews');
    }

    public function test_create_method_returns_view_with_products()
    {
        $response = $this->get(route('reviews.create'));

        $response->assertStatus(200);
        $response->assertViewIs('reviews.create');
        $response->assertViewHas('products');
    }

    public function test_edit_method_returns_view_with_review_and_products()
    {
        $review = Review::factory()->create();
        $response = $this->get(route('reviews.edit', $review));

        $response->assertStatus(200);
        $response->assertViewIs('reviews.edit');
        $response->assertViewHas('review', $review);
        $response->assertViewHas('products');
    }

    public function test_store_method_creates_new_review_and_redirects_to_index()
    {
        $product = Product::factory()->create();
        $data = [
            'content' => 'Sample review content',
            'rating' => 5,
            'product_id' => $product->id,
        ];

        $response = $this->post(route('reviews.store'), $data);

        $response->assertRedirect(route('reviews.index'));
        $this->assertDatabaseHas('reviews', $data);
    }

    public function test_update_method_updates_review_and_redirects_to_index()
    {
        $review = Review::factory()->create();
        $product = Product::factory()->create();
        $data = [
            'content' => 'Updated review content',
            'rating' => 4,
            'product_id' => $product->id,
        ];

        $response = $this->put(route('reviews.update', $review->id), $data);

        $response->assertRedirect(route('reviews.index'));
        $this->assertDatabaseHas('reviews', $data);
    }

    public function test_destroy_method_deletes_review_and_redirects_to_index()
    {
        $review = Review::factory()->create();

        $response = $this->delete(route('reviews.destroy', $review->id));

        $response->assertRedirect(route('reviews.index'));
        $this->assertDatabaseMissing('reviews', ['id' => $review->id]);
    }
}
