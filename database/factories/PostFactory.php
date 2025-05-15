<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => null,
            'title' => fake()->sentence(),
            'slug' => fake()->slug(),
            'image' => '/dummy.svg',
            'author' => fake()->name(),
            'date' => now(),
            'content' => fake()->paragraph(),
        ];
    }
}
